@extends('layouts.theam')

@section('css')
<style>
    .bg-gray,.bg-gray table{
        background: #cccccc;
    }
</style>
@endsection


@section('js')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{-- //cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}

    <script id="details-template" type="text/x-handlebars-template">
        <div class="label label-info">Enquiry of @{{ name }}'s Follow Up</div>
        <table class="table details-table" id="followUp-@{{ id }}">
            <thead>
            <tr>
                <th>Date</th>
                <th>AddedBy</th>
                <th>Status</th>
                <th>Note</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </script>


<script type="text/javascript">

    $(function () {

        var template = Handlebars.compile($("#details-template").html());


        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            bFilter: true,
            lengthChange: false,
            ajax: "{{ route('Enquires.index') }}",
            columns: [
                {
                "className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "defaultContent": ''
                },
                {data: 'enquiry_id', name: 'enquiry_id'},
                {data: 'enq', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'preferred_country', name: 'preferred_country'},
                {data: 'date', name: 'date',orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? val : '', true, false).draw();
                    });
                });
            }
        });

            // Add event listener for opening and closing details

        $('.data-table tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var tableId = 'followUp-' + row.data().id;

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(template(row.data())).show();
                initTable(tableId, row.data());
                tr.addClass('shown');
                tr.next().find('td').addClass('no-padding bg-gray');
            }
        });


        function initTable(tableId, data) {
            $('#' + tableId).DataTable({
                processing: false,
                serverSide: false,
                bFilter: false,
                lengthChange: false,
                oLanguage: {
                    sEmptyTable: "No Follow Up Received Yet"
                },
                ajax: data.details_url,
                columns: [
                    { data: 'date', name: 'date' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'status', name: 'status' },
                    { data: 'note', name: 'note' },

                ]
            })
        }
        });

</script>

@endsection

@section('title')
Enquires index
@endsection


@section('content')
<div class="col-xl-12 layout-top-spacing" id="cancel-row">

@if ($success_msg = Session::get('success_msg'))
<div class="col-md-12">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{ __('enquire.well_done') }}</h4>
        <p>{{ __('enquire.success_msg',['code' => $success_msg]) }}</p>
        <hr>
    </div>
</div>
@endif

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        @can('create-enquiry')
            <a  href="{{ route('Enquires.create') }}" class="btn btn-info" >Add New Enquiry</a>
        @endcan

          <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Follow Ups</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-text">
                            <table class="table details-table" id="followUp-model">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>AddedBy</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="POST" action="#" enctype="multipart/form-data" id="add_follow_ups">
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
        <br>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>EnqId</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Preferred Country</th>
                    <th>Date</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script>
    function show_follow_up(params) {
            console.log(params);

            $("#exampleModal").modal('show');
            // url='url("api/admin/inquiry/FollowUp/'+params+'")';
            let data=[];
            data['details_url']='{{ url('api/admin/inquiry/FollowUp/') }}/'+params;

            fetch("{{ url('api/admin/inquiry/FollowUp/') }}/"+params)
            .then(response => response.json())
            .then(data => {

                for(var i=0;i<data.data.length;i++){
                    let row=data.data[i];
                    console.log(row);
                    $('#followUp-model tbody').append('<tr>');
                    $('#followUp-model tbody').append("<td>"+row.date+"</td>");
                    $('#followUp-model tbody').append("<td>"+row.user.name+"</td>");
                    $('#followUp-model tbody').append("<td>"+row.status+"</td>");
                    $('#followUp-model tbody').append("<td>"+row.note+"</td>");
                    $('#followUp-model tbody').append('</tr>');
                }
            });
        }

    function add_follow_up(params) {
        $("#exampleModal01").modal('show');
        url="{{url('admin/FollowUp/store/') }}/"+params;
        $('#add_follow_ups').attr('action', url);
        return false;
            $("#exampleModal").modal('show');
            let data=[];
            data['details_url']='{{ url('api/admin/inquiry/FollowUp/') }}/'+params;

            fetch("{{ url('api/admin/inquiry/FollowUp/') }}/"+params)
            .then(response => response.json())
            .then(data => {

                for(var i=0;i<data.data.length;i++){
                    let row=data.data[i];
                    console.log(row);
                    $('#followUp-model tbody').append('<tr>');
                    $('#followUp-model tbody').append("<td>"+row.date+"</td>");
                    $('#followUp-model tbody').append("<td>"+row.user.name+"</td>");
                    $('#followUp-model tbody').append("<td>"+row.status+"</td>");
                    $('#followUp-model tbody').append("<td>"+row.note+"</td>");
                    $('#followUp-model tbody').append('</tr>');
                }
            });
        }
</script>



@endsection
