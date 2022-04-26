@extends('layouts.theam');

@section('title')
Edit Application
@endsection

@section('css')
<link href="{{ asset('assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">Application Edit</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form method="POST" action="{{ route('Application.update',$Application->id) }}">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">University</label>
                                    <input type="text" readonly class="form-control" value="{{ $university->name }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Course</label>
                                    <input type="text" readonly class="form-control" value="{{ $course->name }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="intact_month_id">Intake Month</label>
                                    <input type="intact_month" readonly value="{{ $intact->month }}" name="intact_month" id="intact_month" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="intact_year_id">Intake Year</label>
                                    <input type="intact_month" readonly value="2021" name="intact_month" class="form-control" required>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                        @foreach ($status as $item)
                                        <option value="{{ $item->status }}"
                                        @if ($Application->status==$item->status)
                                        selected
                                        @endif
                                        >{{ $item->status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Processor</label>
                                    <select name="processor_id" id="" class="form-control">
                                        @foreach ($processor as $item)
                                        <option value="{{ $item->id }}"
                                        @if ($Application->processor_id==$item->id)
                                        selected
                                        @endif
                                        >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Apply Through</label>
                                    <input type="text" name="associated_with" id="status" class="form-control" value="{{ $Application->associated_with ?? "" }}" @isset($Application->associated_with) readonly @else required @endisset>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Remark</label>
                                    <textarea name="remark" class="form-control" required>{{ $Application->remark }}</textarea>
                                </div>
                            </div> --}}

                            <div class="col-md-12 text-center">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <a href="{{route('Application.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<br>

<div class="col-md-12 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">Application Status</div>
                <div class="card-body">
                    <h3> Application Start Process is {{ number_format($process,2) }}% done. </h3>
                    <div class="progress mb-4 progress-bar-stack br-30">
                        {{-- <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $pending }}%" aria-valuenow="{{ $pending }}" aria-valuemin="0" aria-valuemax="100"></div> --}}
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $process }}%" aria-valuenow="{{ $process }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed mb-4">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Responsible Person</th>
                                    <th>Note</th>
                                    <th>Start Date</th>
                                    <th>Completed Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($status as $item)
                                <tr>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $remark[$item->id]['user'] ?? "Not Set Yet" }}</td>
                                    <td>{{ $remark[$item->id]['remark'] ?? "Not Set Yet" }}</td>
                                    <td>{{ $remark[$item->id]['start_date'] ?? "Not Started Yet" }}</td>
                                    @if (isset($remark[$item->id]['completed_date']))
                                        <td>{{ date('d-M-Y',strtotime($remark[$item->id]['created_at'])) ?? "Not Set Yet" }}</td>
                                    @else
                                        <td>Not Set Yet</td>
                                    @endif
                                    <td class="text-center">
                                        @if(isset($remark[$item->id]['completed_date']))
                                            <span class="@if($remark[$item->id]['is_not_applicable']==0) text-success @else text-danger @endif">@if($remark[$item->id]['is_not_applicable']==0) Complete @else Not Applicable @endif </span></td>
                                        @else
                                            <ul class="table-controls">
                                                @if(isset($remark[$item->id]['start_date']))
                                                <li>
                                                    <a href="javascript:void(0);" data-item="{{ $item }}" class="apply_status bs-tooltip"  data-toggle="tooltip" data-placement="top" title="Apply"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a>
                                                </li>
                                                @else
                                                <li>
                                                    <a href="{{ route('Application.StartWorkStatus',['Application'=>$Application->id,'status'=>$item->id]) }}" data-item="{{ $item }}" class="start_work bs-tooltip"  data-toggle="tooltip" data-placement="top" title="Start Process"><svg style="color: #ffcc00;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg></a>
                                                </li>
                                                @endif
                                                <li>
                                                    <a href="javascript:void(0);" class="NaStatus bs-tooltip" data-item="{{ $item }}" data-toggle="tooltip" data-placement="top" title="Not Applicable"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>
                                                </li>
                                            </ul>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Responsible Person</th>
                                    <th>Note</th>
                                    <th>Start Date</th>
                                    <th>Completed Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-md-12 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">Follow Ups</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed mb-4">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>Assist By</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Application->FollowUp as $item)
                                <tr>
                                    <td>{{ date('d-M-Y',strtotime($item->date)) }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>{{ $item->User->name }}</td>
                                    <td class="text-center">
                                        @if ($item->is_resolved==0)
                                            <a href="{{ route('ApplicationFollowUp.resolved',['ApplicationFollowUp'=>$item->id,'status'=>1]) }}" class="btn btn-danger">Done</a>
                                            <a href="javascript:void(0);" class="btn btn-info resadule" data-item="{{ $item }}">Re-Schedule</a>
                                        @else
                                            <span class="text-success"> Complete  </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>Assist By</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@if(count($documents)>0)
<div class="col-md-12 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">Documents</div>
                <div class="card-body">
                    @if ($errors->any())
                        {{-- <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> --}}
                    @endif
                    @forelse ($documents as $item)
                        <div class="card component-card_6 mb-2">
                            <div class="card-body ">
                                <div class="">
                                    <h4 class="card-text">{{ $item->name }} </h4>
                                    <h6 class="rating-count"><span class="badge outline-badge-primary"> {{ $item->status }} </span></h6>
                                    <h6 class="rating-count"><a href='{{ asset($item->file_name) }}' target="_blank" class='btn btn-info'>Show</a></h6>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
            </div>

        </div>
    </div>
</div>
@endif
<div class="col-md-12 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">Student Detail</div>
                <div class="card-body">

                    <x-EnquiryDetailPopUp type="error" :message="$Application->enquiry" class="mt-4"/>
                </div>
            </div>

        </div>
    </div>
</div>


  <form action="{{ route('Application.StatusRemark',$Application->id) }}" method="POST">
    @csrf
      <div class="modal fade" id="ChangeStatusModel" tabindex="-1" role="dialog" aria-labelledby="ChangeStatusModelLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="ChangeStatusModelLabel">Apply Status</h5>
                      <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close" >
                          X
                      </button>
                  </div>
                  <input type="hidden" name="is_not_applicable" id="applicableLabel" value="0">
                  <input type="hidden" name="status_id" id="statusLabel">
                  <div class="modal-body">
                    <div class="form-group mb-4">
                        <label class="control-label">Note :</label>
                        <textarea name="remark" class="form-control" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </div>
          </div>
      </div>
  </form>

  <div class="modal fade" id="exampleModal01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="#" enctype="multipart/form-data" id="add_status_follow_ups">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reschedule Follow Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="parent_id" id="parent_id_label">
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
@endsection

@section('js')
    <script>
        $(".apply_status").click(function(e){
            $("#ChangeStatusModelLabel").html("Apply To Status");
            $("#statusLabel").val($(this).data('item').id);
            $("#ChangeStatusModel").modal("show");
        });
        $(".start_work").click(function(e){
            alert("start work");
        });
        $(".NaStatus").click(function(){
            $("#ChangeStatusModelLabel").html("Not Applicable.");
            $("#statusLabel").val($(this).data('item').id);
            $("#applicableLabel").val(1);
            $("#ChangeStatusModel").modal("show");
        });
        $(".resadule").click(function() {
            // exampleModal01
            $("#note").html($(this).data('item').note);
            url="{{url('admin/ApplicationFollowUp/reschedule/') }}/"+$(this).data('item').application_id;
            $('#add_status_follow_ups').attr('action', url);
            $("#exampleModal01").modal("show");
            $("#parent_id_label").val($(this).data('item').id);

        });
    </script>
@endsection
