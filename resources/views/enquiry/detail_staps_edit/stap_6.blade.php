
@foreach ($enquiry->Documents as $item)
<div class="card component-card_6">
    <div class="card-body ">
        <div class="d-xl-flex d-block justify-content-between">
            <h4 class="card-text">{{ $item->name }} </h4>
            <h6 class="rating-count"><span class="badge outline-badge-primary"> {{ $item->status }} </span></h6>
            <h6 class="rating-count"><a href='{{ asset($item->file_name) }}' target="_blank" class='btn btn-info'>Show</a></h6>
        </div>
    </div>
</div>
@endforeach
<hr>
<br>
<div class="text-center">
    <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModal"> Add Document </button>
</div>


@section('child_model')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <select class="form-control" id="file_type_document" onchange="change_type_document('file_type_document')" required>
                                            @foreach (config('espi.enquires_detail.document_list') as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input name="enquiry" type="hidden" value="{{ $enquiry->id }}">
                                <div class="row">
                                    <div class="col" id="file_title_document_con" style="display: none">
                                        <label for="file_title_document">File Title</label>
                                        <input id="file_title_document" type="text" name="title" class="form-control" placeholder="Title of Documnet" style="display: none" required>
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



@section('child_js')
<script>
    function change_type_document(params) {
        sel= $("#"+params).val();
        val=$("#"+params+" option:selected").text();
        if(sel == "other")
        {
            $("#file_title_document").val("");
            $("#file_title_document").show();
            $("#file_title_document_con").show();
        }
        else
        {
            $("#file_title_document").val(val);
            $("#file_title_document").hide();
            $("#file_title_document_con").hide();
        }
    }
</script>
@endsection
