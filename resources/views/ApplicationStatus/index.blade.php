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
                    sEmptyTable: "No Applications Status Received Yet"
                },
            ajax: "{{ route('ApplicationStatus.index') }}",
            columns: [
                {data: 'status', name: 'status'},
                {data: 'country.name', name: 'country.name', orderable: false, searchable: false},
                {data: 'visibility', name: 'visibility', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
                $('.bs-tooltip').tooltip();
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

                // console.log(row.data());


                // initTable(tableId, row.data());
                // tr.addClass('shown');
                // tr.next().find('td').addClass('no-padding bg-gray');
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
Application Status
@endsection


@section('content')
<div class="col-md-12">
    <h1>Application Status</h1>

    <div class="modal fade" id="exampleModal01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('ApplicationStatus.store') }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                            @csrf
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date" class="mandatory">Status</label>
                                            <input type="text" name="status" value="{{ old('date') }}" class="@error('date') is-invalid @enderror form-control" required>
                                        </div>
                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="selectcountry">Select Country</label>
                                            <select id="selectcountry" name="countries_id" onchange="get_university(this)" class="form-control" required>
                                                    @forelse ( get_country() as $uni)
                                                        <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
                                                    @empty
                                                        <option value="#">No Country Available </option>
                                                    @endforelse
                                            </select>
                                        </div>
                                        @error('status')
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

    <div class="modal fade" id="EditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="#" id="edit_url">
            @method('PATCH')
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                            @csrf
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date" class="mandatory">Status</label>
                                            <input id="edit_status" type="text" name="status" value="{{ old('date') }}" class="@error('date') is-invalid @enderror form-control" required>
                                        </div>
                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit_contry">Select Country</label>
                                            <select id="edit_contry" name="countries_id" onchange="get_university(this)" class="form-control" required>
                                                    @forelse ( get_country() as $uni)
                                                        <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
                                                    @empty
                                                        <option value="#">No Country Available </option>
                                                    @endforelse
                                            </select>
                                        </div>
                                        @error('status')
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

    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal01">
        Add New Status
      </button>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Country</th>
                <th>Visibility</th>
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
        function edit_status(id)
        {
            // data['details_url']='{{ url('api/admin/inquiry/FollowUp/') }}/'+params;

            fetch("{{ url('admin/ApplicationStatus/') }}/"+id)
            .then(response => response.json())
            .then(data => {
                post_url="{{ url('admin/ApplicationStatus/') }}/"+id
                $('#EditModel').modal('show');
                $('#edit_status').val(data.status);
                $("#edit_contry").val(data.countries_id);
                $("#edit_url").attr("action",post_url);
            });
        }

        function delet_status(id) {
            const formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            if (confirm('Are you sure you want to Delete this thing into the database?')) {
                fetch("{{ url('admin/ApplicationStatus/') }}/"+id,{
                    method: 'delete',
                    headers: {
                      'Content-type': 'application/json; charset=UTF-8',
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // post_url="{{ url('admin/ApplicationStatus/') }}/"+id
                    // $('#EditModel').modal('show');
                    // $('#edit_status').val(data.status);
                    // $("#edit_contry").val(data.countries_id);
                    // $("#edit_url").attr("action",post_url);
                })
                .catch(error => console.log(err));
                var table = $('.data-table').DataTable();
                table.ajax.reload();
            } else {

            }
        }
</script>

@endsection
