@extends('layouts.theam')

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

<script type="text/javascript">

    $(function () {


        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            bFilter: false,
            lengthChange: false,
            oLanguage: {
                    sEmptyTable: "No Task Found Yet"
                },
            ajax: "{{ route('task.index') }}",
            columns: [
                { data: 'subject', name: 'subject' },
                    { data: 'start_date', name: 'start_date' },
                    { data: 'date', name: 'date' },
                    { data: 'Priority', name: 'Priority' },
                    { data: 'Related', name: 'Related' },
                    { data: 'Assignees', name: 'Assignees' },
                    { data: 'Followers', name: 'Followers' },
                    { data:'note',name:'note'},
                    { data: 'Status', name: 'Status' ,class:'badgee status '},
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
            var tableId = 'application-' + row.data().id;

            console.log(tableId);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(template(row.data())).show();
                initTable(tableId, row.data());
                console.log(row.data());
                tr.addClass('shown');
                tr.next().find('td').addClass('no-padding bg-gray');
            }
        });

        function initTable(tableId, data) {
            $('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                bFilter: false,
                lengthChange: false,
                oLanguage: {
                    sEmptyTable: "No Task Created Yet"
                },
                ajax: data.details_url,
                columns: [
                    { data: 'subject', name: 'subject' },
                    { data: 'start_date', name: 'start_date' },
                    { data: 'date', name: 'date' },
                    { data: 'Priority', name: 'Priority' },
                    { data: 'Status', name: 'Status' },
                    { data: 'Related', name: 'Related' },
                    { data: 'Assignees', name: 'Assignees' },
                    { data: 'Followers', name: 'Followers' },
                    { data:'note',name:'note'},
                ]
            })
        }
        });
        // Add event listener for opening and closing details
</script>

@endsection

@section('title')
Task
@endsection

@section('content')
<style>
    p.w-value {
    text-align: center;
    font-weight: 900;
}

   td.status {
    line-height: 1.4;
        font-weight: 600;
        text-align: center;
        border-radius: .25rem;
        border: 1px solid #03A9F4;    background: #03A9F4;
    }
    td.badgee.status {
  font-weight: 600;color: #ddf5f0;
  line-height: 1.4;
  padding: 3px 6px;
  font-size: 13px;
  font-weight: 600;
  transition: all 0.3s ease-out;
  -webkit-transition: all 0.3s ease-out; }
  td.badgee.status:hover {
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
    -webkit-transform: translateY(-3px);
    transform: translateY(-3px); }
</style>
@foreach ( $user_info as $test )
<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="margin: 0px 1px 13px;">
                <div class="widget widget-one_hybrid widget-engagement">
                    <div class="widget-heading">
                        <div class="w-title">
                            <div class="w-icon" style="padding: 9px;">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-04-21-040700/theme/demo2/dist/../src/media/svg/icons/Home/Commode2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </div>
                            <div class="">
                                <p class="w-value">{{ $test->total  }}</p>
                                <h5 class="x-h5" style="text-align: center;">{{ $test->Status  }}</p></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
		@endforeach
    </div>
        <div class="row">
            <a href="{{ route('task.create') }}" title="Add Task" class="btn btn-info" style="float: right">Add  Task</a>
            </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Start Date</th>
                <th>Due  Date</th>
                <th>Priority</th>
                <th>Related</th>
                <th>Assignees</th>
                <th>Followers</th>
                <th>Note</th>
                <th>Status</th>
                    <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>

@endsection
