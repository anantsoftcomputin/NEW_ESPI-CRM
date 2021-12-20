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

<script id="details-template" type="text/x-handlebars-template">
    <div class="label label-info">@{{ enquiry.first_name }}'s Follow Up List</div>
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
            bFilter: false,
            lengthChange: false,
            oLanguage: {
                    sEmptyTable: "No Applications Received Yet"
                },
            ajax: "{{ route('Application.index') }}",
            columns: [
                {
                "className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "defaultContent": ''
                },
                {data: 'application_id', name: 'application_id'},
                {data: 'enquiry.name', name: 'enquiry.name', orderable: false, searchable: false},
                {data: 'university.name', name: 'university.name', orderable: false, searchable: false},
                { data: 'course.name', name: 'course.name' , orderable: false, searchable: false},
                { data: 'university.country.name', name: 'university.country.name' },
                {data: 'status', name: 'status'},
                {data: 'date', name: 'date'},
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

                console.log(row.data());

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
        // Add event listener for opening and closing details

</script>

@endsection

@section('title')
Application
@endsection


@section('content')
<div class="col-md-12">
    <h1>Application</h1>

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

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Application Ref #</th>
                <th>Student Email</th>
                <th>University</th>
                <th>Course</th>
                <th>Contry</th>
                <th>Status</th>
                <th>Date</th>
                <th width="200px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>

<script>
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
