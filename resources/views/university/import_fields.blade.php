@extends('layouts.theam')

@section('title')
Add university
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">{{ __('university.upload_preview_msg') }}</div>
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
                <form class="form-horizontal" method="POST" action="{{ route('university_import_save') }}">
                    
                    <div class="col-md-12 text-center table-responsive">
                    <table id="sample_table" class="table table-bordered">
                        {{ csrf_field() }}
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Campus</th>
                                <th>Provision State</th>
                                <th>Intake Year</th>
                                <th>Intake Month</th>
                                <th>Application Fees</th>
                                <th>Website</th>

                                <th>D-Req-ACA-%</th>
                                <th>D-Req-ACA-GPA</th>
                                <th>D-Req-LAN-%</th>
                                <th>D-Req-LAN-GPA</th>

                                <th>G-Req-ACA-%</th>
                                <th>G-Req-ACA-GPA</th>
                                <th>G-Req-LAN-%</th>
                                <th>G-Req-LAN-GPA</th>

                                <th>PG-Req-ACA-%</th>
                                <th>PG-Req-ACA-GPA</th>
                                <th>PG-Req-LAN-%</th>
                                <th>PG-Req-LAN-GPA</th>

                                <th>10-Req-ACA-%</th>
                                <th>10-Req-ACA-GPA</th>
                                <th>10-Req-LAN-%</th>
                                <th>10-Req-LAN-GPA</th>

                                <th>12-Req-ACA-%</th>
                                <th>12-Req-ACA-GPA</th>
                                <th>12-Req-LAN-%</th>
                                <th>12-Req-LAN-GPA</th>

                                <th>Action</th>
                            </tr>
                            <tbody id="tbl_posts_body">    
                                @php
                                $srno=$i=0;
                                @endphp
                                @foreach ($data[0] as $key => $value)
                                @php
                                $srno++;
                                @endphp
                                @if($srno > 1)
                                @php
                                $i++;
                                @endphp
                                    <tr id="{{$i}}">
                                        <td><span class="sn">{{$i}}</span>.</td>
                                        <td><input type='hidden' name='name[]' value='{{$value[0]}}'>{{$value[0]}}</td>
                                        <td><input type='hidden' name='description[]' value='{{$value[1]}}'>{{$value[1]}}</td>
                                        <td><input type='hidden' name='address[]' value='{{$value[2]}}'>{{$value[2]}}</td>
                                        <td><input type='hidden' name='phone[]' value='{{$value[3]}}'>{{$value[3]}}</td>
                                        <td><input type='hidden' name='email[]' value='{{$value[4]}}'>{{$value[4]}}</td>                        
                                        <td><input type='hidden' name='country[]' value='{{$value[5]}}'>{{$value[5]}}</td>
                                        <td><input type='hidden' name='campus[]' value='{{$value[6]}}'>{{$value[6]}}</td> 
                                        <td><input type='hidden' name='provision_state[]' value='{{$value[7]}}'>{{$value[7]}}</td>
                                        <td><input type='hidden' name='intake_year[]' value='{{$value[8]}}'>{{$value[8]}}</td>
                                        <td><input type='hidden' name='intake_month[]' value='{{$value[9]}}'>{{$value[9]}}</td> 
                                        
                                        <td><input type='hidden' name='web[]' value='{{$value[10]}}'>{{$value[10]}}</td>  
                                        <td><input type='hidden' name='application_fees[]' value='{{$value[11]}}'>{{$value[11]}}</td>                      
                                        
                                        <td><input type='hidden' name='d_req_aca_per[]' value='{{$value[12]}}'>{{$value[12]}}</td>                   
                                        <td><input type='hidden' name='d_req_aca_gpa[]' value='{{$value[13]}}'>{{$value[13]}}</td>
                                        <td><input type='hidden' name='d_req_lan_per[]' value='{{$value[14]}}'>{{$value[14]}}</td>                   
                                        <td><input type='hidden' name='d_req_lan_gpa[]' value='{{$value[15]}}'>{{$value[15]}}</td>

                                        <td><input type='hidden' name='g_req_aca_per[]' value='{{$value[16]}}'>{{$value[16]}}</td>                   
                                        <td><input type='hidden' name='g_req_aca_gpa[]' value='{{$value[17]}}'>{{$value[17]}}</td>
                                        <td><input type='hidden' name='g_req_lan_per[]' value='{{$value[18]}}'>{{$value[18]}}</td>                   
                                        <td><input type='hidden' name='g_req_lan_gpa[]' value='{{$value[19]}}'>{{$value[19]}}</td>

                                        <td><input type='hidden' name='pg_req_aca_per[]' value='{{$value[20]}}'>{{$value[20]}}</td>                   
                                        <td><input type='hidden' name='pg_req_aca_gpa[]' value='{{$value[21]}}'>{{$value[21]}}</td>
                                        <td><input type='hidden' name='pg_req_lan_per[]' value='{{$value[22]}}'>{{$value[22]}}</td>                   
                                        <td><input type='hidden' name='pg_req_lan_gpa[]' value='{{$value[23]}}'>{{$value[23]}}</td>

                                        <td><input type='hidden' name='ten_req_aca_per[]' value='{{$value[24]}}'>{{$value[24]}}</td>                   
                                        <td><input type='hidden' name='ten_req_aca_gpa[]' value='{{$value[25]}}'>{{$value[25]}}</td>
                                        <td><input type='hidden' name='ten_req_lan_per[]' value='{{$value[26]}}'>{{$value[26]}}</td>                   
                                        <td><input type='hidden' name='ten_req_lan_gpa[]' value='{{$value[27]}}'>{{$value[27]}}</td>

                                        <td><input type='hidden' name='twelve_req_aca_per[]' value='{{$value[28]}}'>{{$value[28]}}</td>                   
                                        <td><input type='hidden' name='twelve_req_aca_gpa[]' value='{{$value[29]}}'>{{$value[29]}}</td>
                                        <td><input type='hidden' name='twelve_req_lan_per[]' value='{{$value[30]}}'>{{$value[30]}}</td>                   
                                        <td><input type='hidden' name='twelve_req_lan_gpa[]' value='{{$value[31]}}'>{{$value[31]}}</td>

                                        <td>
                                            <a href="#" title='Delete' class="btn btn-danger delete-record" data-id="{{$i}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endif    
                                @endforeach
                            </tbody>
                    </table>
                    </div>
                    <div class="col-md-12 text-right">
                        <div class="form-group">
                            <button class="btn btn-primary" title="Import University">Save</button>
                        </div>
                    </div> 
                </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      $('table#sample_table tr#'+id).remove();
        $('#tbl_posts_body tr').each(function(index) {
      //alert(index);
        $(this).find('span.sn').html(index+1);
        });
        return true;
    } else {
        return false;
    }
});
</script>
@endsection
