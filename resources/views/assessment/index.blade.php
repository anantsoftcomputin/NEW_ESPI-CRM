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

<script type="text/javascript">

    $(function () {


        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            bFilter:  true,
                lengthChange: true,
            oLanguage: {
                    sEmptyTable: "No Assessments Received Yet"
                },
            ajax: "{{ route('assessments.index') }}",
            columns: [
<<<<<<< HEAD
                {data: 'university.name', name: 'university.name', orderable: false, searchable: false},
                { data: 'course.name', name: 'course.name' , orderable: false, searchable: false},
                { data: 'enquiry.name', name: 'enquiry.name' , orderable: false, searchable: false},
                { data: 'status', name: 'status' , orderable: false, searchable: false},
                { data: 'assign_to', name: 'assign_to' , orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
=======
                { data: 'enquiry.enquiry_id', name: 'enquiry.enquiry_id',orderable:'false',searchable: false },
                { data: 'enquiry.name', name: 'enquiry.name',orderable: false,searchable: false},
                { data: 'university.country.name', name: 'university.country.name',orderable: false,searchable: false},
                {data: 'university.name', name: 'university.name', orderable: false,searchable: false},
                { data: 'course.name', name: 'course.name' , orderable: false,searchable: false},
                { data: 'status', name: 'status' , orderable: true ,searchable: true},
                { data: 'assign_to', name: 'assign_to' , orderable: false, searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: true},
>>>>>>> 217396e7253c35424881268e83ad74377af26894
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


        function initTable(tableId, data) {
            $('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                bFilter:  true,
                lengthChange: true,
                oLanguage: {
                    sEmptyTable: "No Assessments Received Yet"
                },
                ajax: data.details_url,
                columns: [
                    { data: 'enquiry.enquiry_id', name: 'enquiry.enquiry_id',orderable:'false',searchable: true },
                    { data: 'enquiry.name', name: 'enquiry.name',orderable:'false',searchable: true },
                    { data: 'university.country.name', name: 'university.country.name',orderable: false,searchable: false},
                    { data: 'university.name', name: 'university.name',orderable:'false', searchable: true },
                    { data: 'course.name', name: 'course.name' },
                    {data: 'status', name: 'status'},
                    {data: 'assign_to', name: 'assign_to'},
                    { data: 'user.name', name: 'user.name',orderable:'false', searchable: true },
                ]
            })
        }
        });

        function assign_action(user,assessment_id)
        {
            let URL="{{ url('api/admin/assign_user/') }}/"+user+'/'+assessment_id;
            $.ajax(URL,
                {
                    success: function () {   // success callback function
                        $('.data-table').DataTable().ajax.reload();
                    },
                    error: function (jqXhr, textStatus, errorMessage) { // error callback
                        $('p').append('Error: ' + errorMessage);
                    }
                });
        }
        // Add event listener for opening and closing details
</script>

@endsection

@section('title')
Application
@endsection


@section('content')
<div class="col-md-12">
    <h1>Assessments</h1>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Enquiry Id</th>
                <th>Name</th>
                <th>Country Name</th>
                <th>University</th>
                <th  width="200px">Course</th>
                <th width="100px">Name</th>
                <th width="100px">Status</th>
                <th  width="100px">Assign To</th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>

@endsection
