<div class="col-md-12 text-center mt-2 mb-3">
    {{-- <a href="#" class="text-center btn btn-info">Add Follow Up</a> --}}
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Sale</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($enquiry->followUp as $follow)
                <tr>
                    <td>
                        <span class="badge badge-primary">
                            {{ $follow->date }}
                        </span>
                        </td>
                    <td>{{ $follow->status }}</td>
                    <td>
                        <a class="#" title="{{ $follow->note }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        </a>
                    </td>
                </tr>
                {{-- <hr>
                        <li class="row" style="">
                            <div class="col-md-3">
                                {{ $follow->status }}
                            </div>
                            <div class="col-md-3">
                                {{ $follow->date }}
                            </div>
                        </li>
                    <hr> --}}
                    @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModal">
        Add Follow Up
      </button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('FollowUp.store',$enquiry->id) }}" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Follow Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">


                        @csrf
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="date" class="mandatory">Next Follow-Ups Date</label>
                                        <input type="date" name="date" id="date" value="{{ old('date') }}"
                                            class="@error('date') is-invalid @enderror form-control" required>
                                    </div>
                                    @error('date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status" class="mandatory">Status</label>
                                        {{-- <input type="status" name="status" id="status" value="{{ old('status') }}"
                                            class="@error('status') is-invalid @enderror form-control" required> --}}
                                            <select name="status" id="status" class="@error('status') is-invalid @enderror form-control" required>
                                                <option value="Open">Open</option>
                                                <option value="Success">Success</option>
                                                <option value="Failure">Failure</option>
                                            </select>
                                    </div>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="note" class="mandatory">Note</label>
                                        <textarea name="note" id="note" class="form-control"></textarea>
                                    </div>
                                    @error('note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" style="background-color:var(--danger); color:#fff;" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
