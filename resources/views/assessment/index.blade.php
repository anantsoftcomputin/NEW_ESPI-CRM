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
                { data: 'enquiry_id', name: 'Enquiry.enquiry_id' },
                { data: 'enquiry_list', name: 'Enquiry.name'},
                { data: 'phone', name: 'Enquiry.phone'},
                { data: 'email', name: 'Enquiry.email'},
                { data: 'agent_detail', name: 'agent_detail' },
                { data: 'action', name: 'action', orderable: false, searchable: true},
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var title = "";

                    var input = '<input type="text" class="form-control" placeholder="'+title+'" />';
                    if(this.index() != "4" && this.index() != "5")
                    {
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? val : '', true, false).draw();
                        });
                    }
                    else
                    {
                        $(column.footer()).empty();
                    }
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
                    { data: 'enquiry.email', name: 'enquiry.email',orderable: false,searchable: false},
                    { data: 'university.name', name: 'university.name',orderable:'false', searchable: true },
                    { data: 'course.name', name: 'course.name' },
                    {data: 'date', name: 'status'},
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
Assessments
@endsection


@section('content')
<div class="col-md-12">
    <h1>Assessments</h1>

    <table id="example" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Enquiry Id</th>
                <th>Student Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Agent Detail</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Enquiry Id</th>
                <th>Student Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Agent Detail</th>
                <th width="100px">Action</th>
            </tr>
        </tfoot>
        <tbody>
        </tbody>
        
    </table>

</div>
@endsection
