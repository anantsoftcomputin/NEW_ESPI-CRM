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
        <div class="label label-info">User @{{ name }}'s Posts</div>
        <table class="table details-table" id="application-@{{ id }}">
            <thead>
            <tr>
                <th>Applied At</th>
                <th>University</th>
                <th>Course</th>
                <th>Status</th>
            </tr>
            </thead>
        </table>
    </script>


<script type="text/javascript">

    $(function () {

        var template = Handlebars.compile($("#details-template").html());


        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            bFilter: false,
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
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'city.name', name: 'city.name'},
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
                    sEmptyTable: "No Applications Received Yet"
                },
                ajax: data.details_url,
                columns: [
                    { data: 'applied_at', name: 'applied_at' },
                    { data: 'university.name', name: 'university.name' },
                    { data: 'course.name', name: 'course.name' },
                    { data: 'status', name: 'status' }
                ]
            })
        }
        });
        // Add event listener for opening and closing details
</script>

@endsection

@section('title')
Enquires
@endsection


@section('content')
<div class="col-xl-12 layout-top-spacing" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <a  href="{{ route('Enquires.create') }}" class="btn btn-info" >Add</a>
        <br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection
