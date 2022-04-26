@extends('layouts.theam')

@section('css')
<link href="{{ asset('assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
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
        <hr>
        <h3 class="label label-info">Transfer An Enquiry</h3>
        <form method="POST" action="{{ url('admin/send-enquire') }}/@{{ id }}" id="send-enquiry-@{{ id }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" name="counsellor_id">
                            @foreach (my_team_member() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
        <hr>
        <h3 class="label label-info">Copy An Enquiry</h3>
        <form method="POST" action="{{ url('admin/copy-enquire') }}/@{{ id }}" id="copy-enquiry-@{{ id }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" name="counsellor_id">
                            @foreach (my_team_member() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </script>


<script type="text/javascript">
$(document).ready(function() {
    // $(function () {

        var template = Handlebars.compile($("#details-template").html());


        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            bFilter: true,
            responsive: true,
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
                {data: 'enq', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'counsellor_name', name: 'counsellor_name'},
                {data: 'preferred_country', name: 'preferred_country'},
                {data: 'status', name: 'status'},
                {data: 'is_enrolled', name: 'is_enrolled',orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
                $('.bs-tooltip').tooltip();
                $('.danger-lead').tooltip({
                    template: '<div class="tooltip tooltip-danger" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                    title: "Primary"
                });
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? val : '', true, false).draw();
                    });
                });
            },
            fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // console.log(aData.status);
                // if (aData.status == "Pending") {
                //     $('td', nRow).css('background-color', '#fab1a0');
                // } else if (aData.status == "Assign") {
                //     $('td', nRow).css('background-color', '#74b9ff');
                // }else if (aData.status == "Applied") {
                //     $('td', nRow).css('background-color', '#fd79a8');
                // }
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

        $('a.toggle-vis').on( 'click', function (e) {
            //e.preventDefault();
            var table = $('.data-table').DataTable();

            // Get the column API object
            var column = table.column( $(this).attr('data-column') );

            // Toggle the visibility
            column.visible( ! column.visible() );
        } );

        function areyousure(params) {
            let text = "Are you sure you want to transfer this thing into the Fail Lead?\n Either OK or Cancel.";
            if (confirm(text) == true) {
                text = "You pressed OK!";
                window.location.href = params;
            } else {
                text = "You Lead Is Safe!";
                return false;
            }
        }
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
                                                    <select name="status" id="status" class="@error('status') is-invalid @enderror form-control" required>
                                                        @foreach (config('espi.follow_up_status') as $key=>$item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
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
        <div class="modal fade" id="add_transactions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="POST" action="#" enctype="multipart/form-data" id="add_transactions_form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Transactions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                                @csrf
                                <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="package_name" class="mandatory">Package  Name</label>
                                                    <select  id="package_name"  name="package_name"  class="@error('package_name') is-invalid @enderror form-control" required>
                                                    <option value="select">select</option>
                                                        @foreach ($Package as $key=>$item)
                                                            <option value="{{ $item ->name}}">{{ $item->name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('package_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="package_price" class="mandatory">Package  price</label>
                                                    <select  id="package_price"  name="package_price" class="@error('package_price') is-invalid @enderror form-control" required>
                                                    <option value="select">select</option>
                                                        @foreach ($Package as $key=>$item)
                                                            <option value="{{ $item ->price}}">{{ $item->price}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('payment_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="price" class="mandatory">Price</label>
                                                <input type="number" name="price" id="price" value="{{ old('price') }}"
                                                    class="@error('price') is-invalid @enderror form-control" required>
                                            </div>
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="payment_title" class="mandatory">Perpose Of Payment</label>
                                                    <select name="title" id="payment_title" class="@error('payment_title') is-invalid @enderror form-control" required>
                                                        @foreach (config('espi.payment_title') as $key=>$item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('payment_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="payment_mode" class="mandatory" id="payment_mode">Payment Mode</label>
                                                    <select name="payment_mode" id="payment" class="@error('payment_mode') is-invalid @enderror form-control" required>
                                                        @foreach (config('espi.payment_mode') as $key=>$item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bank_name" class="mandatory">Bank Name</label>
                                                <input type="text" name="bank_name" id="price" value="{{ old('bank_name') }}"
                                                    class="@error('bank_name') is-invalid @enderror form-control" >
                                            </div>
                                            @error('bank_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="check_number" class="mandatory">Check  Number</label>
                                                <input type="number" name="check_number" id="price" value="{{ old('check_number') }}"
                                                    class="@error('check_number') is-invalid @enderror form-control" >
                                            </div>
                                            @error('check_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="check_number" class="mandatory">Check  Date</label>
                                                <input type="date" name="check_date" id="price" value="{{ old('check_date') }}"
                                                    class="@error('check_date') is-invalid @enderror form-control" >
                                            </div>
                                            @error('check_date')
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
        <div class="modal fade" id="add_card_transactions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="POST" action="#" enctype="multipart/form-data" id="card_transactions_form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Credit Card Transactions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price" class="mandatory"> Name</label>
                                            {{-- <input type="text" name="name" id="name" value="{{ old('name') }}"
                                                class="@error('name') is-invalid @enderror form-control" required> --}}
                                                <select name="card_number" id="card_number" class="@error('card_number') is-invalid @enderror form-control" required>
                                                    @foreach ( $Transaction as  $item)
                                                    <option value="select">select</option>
                                                        <option value="{{ $item -> name }}">{{ $item -> name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="price" class="mandatory">Card Number</label>
                                                {{-- <input type="number" name="card_number" id="card_number" value="{{ old('card_number') }}"
                                                    class="@error('card_number') is-invalid @enderror form-control" required> --}}
                                                    <select name="card_number" id="card_number" class="@error('card_number') is-invalid @enderror form-control" required>
                                                        @foreach ( $Transaction as  $item)
                                                        <option value="select">select</option>
                                                            <option value="{{ $item -> card_number }}">{{ $item -> card_number }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('card_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="price" class="mandatory">Price</label>
                                                <input type="number" name="price" id="price" value="{{ old('price') }}"
                                                    class="@error('price') is-invalid @enderror form-control" required>
                                            </div>
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="payment_title" class="mandatory">Perpose Of Payment</label>
                                                    <select name="payment_title" id="payment_title" class="@error('payment_title') is-invalid @enderror form-control" required>
                                                        @foreach (config('espi.payment_title') as $key=>$item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('payment_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="payment_status" class="mandatory">Payment Status</label>
                                                    <select name="payment_status" id="payment_status" class="@error('payment_status') is-invalid @enderror form-control" required>
                                                            <option value="">Select</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                    </select>
                                            </div>
                                            @error('payment_status')
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
        <div style="display: none;">
            <br>
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                <div class="dt-buttons">
                    <a class="dt-button btn btn-primary btn-sm toggle-vis mb-1" data-column="1" tabindex="0" aria-controls="show-hide-col"><span>Enquiry Id</span></a>
                    <a class="dt-button btn btn-primary btn-sm toggle-vis mb-1" data-column="2" aria-controls="show-hide-col"><span>Name</span></a>
                    <a class="dt-button btn btn-primary btn-sm toggle-vis mb-1" data-column="3" aria-controls="show-hide-col"><span>Email</span></a>
                    <a class="dt-button btn btn-primary btn-sm toggle-vis mb-1" data-column="4" tabindex="0" aria-controls="show-hide-col"><span>Phone</span></a>
                    <a class="dt-button btn btn-primary btn-sm toggle-vis mb-1" data-column="6" aria-controls="show-hide-col"><span>Prifaed Country</span></a> <button class="dt-button btn btn-primary btn-sm toggle-vis mb-1" tabindex="0" aria-controls="show-hide-col"><span>Salary</span></button> </div></div>
                    {{-- <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Position</a> - <a class="toggle-vis" data-column="2">Office</a> - <a class="toggle-vis" data-column="3">Age</a> - <a class="toggle-vis" data-column="4">Start date</a> - <a class="toggle-vis" data-column="5">Salary</a> --}}
        </div>
        <br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Counsellor Name</th>
                <th>Preferred Country</th>
                <th>Status</th>
                <th>Enrolled</th>
                <th with="350px;">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</div>

<script>
    function show_follow_up(params)
    {
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
    function add_transactions(params) {
        $("#add_transactions").modal('show');
        url="{{url('admin/Transactions/Add/') }}/"+params;
        $('#add_transactions_form').attr('action', url);

        return false;

    }
    function add_card_transactions(params) {
        // console.log('test');
        $("#card_transactions_form").modal('show');
         url="{{url('admin/TransactionCredit/Add/') }}/"+params;
        $('#card_transactions_form').attr('action', url);
        return false;

    }
</script>

{{-- <script type="text/javascript">
$(document).ready(function() {
    $('#payment').on('change', function() {
        alert('hello');
  $('#bank').css('display', 'none');
  if ( $(this).val() === 'Check Payment' ) {
    $('#bank').css('display', 'block');
  }
});
});
    </script> --}}

@endsection
