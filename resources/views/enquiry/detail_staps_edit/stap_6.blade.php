<div class="table-responsive">
    <table class="table table-bordered mb-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Documenet</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enquiry->Documents as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td><span class="text-success">{{ $item->status }}</span></td>
                    <td><a href='{{ asset($item->file_name) }}' target="_blank" class='btn btn-info'>Show</a></td>
                    <td class="text-center"><a href='{{ route('document.delete',['Document' => $item->id , 'mode' => 'edit' ]) }}' class='btn btn-danger bs-tooltip' title="Remove File">X</a></td>
                </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>

<hr>
<br>
<div class="text-center">
    <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModal"> Add Document </button>
</div>


@section('child_model')
    <div class="modal fade" id="exampleModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <form action="{{ route('document.store',['mode'=>'edit']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-text">

                                <div class="row">
                                    <div class="col">
                                        <label for="">Select Type</label>
                                        <select class="form-control" required>
                                            @foreach (config('espi.enquires_detail.document_list') as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input name="enquiry" type="hidden" value="{{ $enquiry->id }}">
                                <div class="row">
                                    <div class="col" id="file_title_document_con">
                                        <label for="file_title_document">File Title</label>
                                        <input id="file_title_document" type="text" name="title" class="form-control" placeholder="Title of Documnet" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="file_input">File</label>
                                        <input id="file_input" name="file" type="file" class="form-control" placeholder="Upload File" accept=".pdf,.doc" required>
                                    </div>
                                </div>
                        </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-outline-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


