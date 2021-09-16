@extends('layouts.theam')

@section('title')
Add university
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">{{ __('Courses Uploaded Data Preview') }}</div>
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
                <form class="form-horizontal" method="POST" action="{{ route('Course.import_save') }}">
                    <div class="col-md-12 text-right">
                        <div class="form-group">
                            <button class="btn btn-primary" title="Import University">Import</button>
                        </div>
                    </div> 
                    <div class="col-md-12 text-center">
                    <table id="sample_table" class="table table-bordered">
                        {{ csrf_field() }}
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>University</th>
                                <th>Course Level</th>
                                <th>Course Requirement Title</th>
                                <th>Course Requirement Type</th>
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
                                        <td><input type='hidden' name='course_name[]' value='{{$value[0]}}'>{{$value[0]}}</td>
                                        <td><input type='hidden' name='university[]' value='{{$value[1]}}'>{{$value[1]}}</td>
                                        <td><input type='hidden' name='course_level[]' value='{{$value[2]}}'>{{$value[2]}}</td>
                                        <td><input type='hidden' name='course_requirement[]' value='{{$value[3]}}'>
                                        @php
                                        $data=explode("###",$value[3]);
                                        foreach($data as $d)
                                        {
                                            
                                            echo $d." ,";
                                        }
                                        
                                        @endphp
                                      
                                        </td>
                                        <td><input type='hidden' name='course_requirement_type[]' value='{{$value[4]}}'>{{$value[4]}}</td>                        
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
