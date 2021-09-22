<div class="col-md-12">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$Course->name}}" class="form-control" required>
    </div>

</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="web">University</label>
        <select name="university_id" id="" class="form-control">
            <option value="#" selected disabled>Selet University</option>
            @foreach ($university as $item)
                <option @if($Course->university_id ==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="default_assign_emp">Default Assign Emp</label>
        <input type="default_assign_emp" value="{{$Course->default_assign_emp ?? ''}}" name="default_assign_emp" id="default_assign_emp" class="form-control" placeholder="This Feature Comming" readonly required>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="course_level">Level</label>
        <select name="course_level" id="course_level" class="form-control" required>
            <option value="#" selected disabled>Course Level</option>
            <option @if($Course->course_level=="under-graduate") selected @endif value="under-graduate">Under Graduate</option>
        </select>
    </div>


    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="#" selected disabled>Status</option>
            <option @if($Course->status=="active") selected @endif value="active">Active</option>
            <option @if($Course->status=="de-active") selected @endif value="de-active">De-Active</option>
        </select>
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="course_duration">Course Duration</label>
        <input type="text" name="duration" value="{{$Course->duration ?? ''}}" id="duration" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Course Link</label>
        <input type="text" name="course_link" value="{{$Course->course_link ?? ''}}" id="course_link" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="course_duration">Application Fees</label>
        <input type="text" name="application_fees" value="{{$Course->application_fees ?? ''}}" id="application_fees" class="form-control">
    </div>
</div>

<div class="col-md-12">
<hr>
<h5>
Course Special Requirement
<hr>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Academic %</label>
        <input type="text" name="d_req_aca_per" value="{{$Course->d_req_aca_per ?? ''}}"  onkeypress="return isNumber(event)" id="d_req_aca_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Academic GPA</label>
        <input type="text" name="d_req_aca_gpa" value="{{$Course->d_req_aca_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="d_req_aca_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Language %</label>
        <input type="text" name="d_req_lan_per" value="{{$Course->d_req_lan_per ?? ''}}"  onkeypress="return isNumber(event)" id="d_req_lan_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Language GPA</label>
        <input type="text" name="d_req_lan_gpa" value="{{$Course->d_req_lan_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="d_req_lan_gpa" class="form-control" required>
    </div>   
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Academic %</label>
        <input type="text" name="g_req_aca_per" value="{{$Course->g_req_aca_per ?? ''}}"  onkeypress="return isNumber(event)" id="g_req_aca_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Academic GPA</label>
        <input type="text" name="g_req_aca_gpa" value="{{$Course->g_req_aca_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="g_req_aca_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Language %</label>
        <input type="text" name="g_req_lan_per" value="{{$Course->g_req_lan_per ?? ''}}"  onkeypress="return isNumber(event)" id="g_req_lan_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Language GPA</label>
        <input type="text" name="g_req_lan_gpa" value="{{$Course->g_req_lan_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="g_req_lan_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Academic %</label>
        <input type="text" name="pg_req_aca_per" value="{{$Course->pg_req_aca_per ?? ''}}"  onkeypress="return isNumber(event)" id="pg_req_aca_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Academic GPA</label>
        <input type="text" name="pg_req_aca_gpa" value="{{$Course->pg_req_aca_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="pg_req_aca_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Language %</label>
        <input type="text" name="pg_req_lan_per" value="{{$Course->pg_req_lan_per ?? ''}}"  onkeypress="return isNumber(event)" id="pg_req_lan_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Language GPA</label>
        <input type="text" name="pg_req_lan_gpa" value="{{$Course->pg_req_lan_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="pg_req_lan_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Requirement Academic %</label>
        <input type="text" name="ten_req_aca_per" value="{{$Course->ten_req_aca_per ?? ''}}"  onkeypress="return isNumber(event)" id="ten_req_aca_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Requirement Academic GPA</label>
        <input type="text" name="ten_req_aca_gpa" value="{{$Course->ten_req_aca_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="ten_req_aca_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Graduate Requirement Language %</label>
        <input type="text" name="ten_req_lan_per" value="{{$Course->ten_req_lan_per ?? ''}}"  onkeypress="return isNumber(event)" id="ten_req_lan_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Requirement Language GPA</label>
        <input type="text" name="ten_req_lan_gpa" value="{{$Course->ten_req_lan_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="ten_req_lan_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Requirement Academic %</label>
        <input type="text" name="twelve_req_aca_per" value="{{$Course->twelve_req_aca_per ?? ''}}"  onkeypress="return isNumber(event)" id="twelve_req_aca_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Requirement Academic GPA</label>
        <input type="text" name="twelve_req_aca_gpa" value="{{$Course->twelve_req_aca_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="twelve_req_aca_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Graduate Requirement Language %</label>
        <input type="text" name="twelve_req_lan_per" value="{{$Course->twelve_req_lan_per ?? ''}}"  onkeypress="return isNumber(event)" id="twelve_req_lan_per" class="form-control" required>
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Requirement Language GPA</label>
        <input type="text" name="twelve_req_lan_gpa" value="{{$Course->twelve_req_lan_gpa ?? ''}}"  onkeypress="return isNumber(event)" id="twelve_req_lan_gpa" class="form-control" required>
    </div>   
</div>

<div class="col-md-12">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

      <table class="table table-bordered" id="tbl_posts">
        <thead>
          <tr>
            <th>#</th>
            <th>Documents</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbl_posts_body">
        @php
        $srno=0;
        @endphp
        @foreach($course_recruitments as $course_recruitment)
        @php
        $srno++;
        @endphp
        <tr id="rec-{{$srno}}">
            <td><input type="hidden" id="cr_{{$srno}}" data-id="cr_{{$course_recruitment->id}}" name="course_recruitment_id[]" value="{{$course_recruitment->id}}"><span class="sn">{{$srno}}</span>.</td>
            <td>
                <select class="form-control" name="course_documents[]">
                    <option value="">select document</option>
                    <option @if($course_recruitment->documents=='photographs') selected @endif value="photographs">Photographs</option>
                    <option @if($course_recruitment->documents=='passport') selected @endif value="passport">Passport</option>
                    <option @if($course_recruitment->documents=='10th') selected @endif value="10th">10th Documents</option>
                    <option @if($course_recruitment->documents=='12th') selected @endif value="12th">12th Documents</option>
                    <option @if($course_recruitment->documents=='diploma_document') selected @endif value="diploma_document">Diploma Documents</option>
                    <option @if($course_recruitment->documents=='bachelor_document') selected @endif value="bachelor_document">Bachelor Documents</option>
                    <option @if($course_recruitment->documents=='master_document') selected @endif value="master_document">Master Documents</option>
                    <option @if($course_recruitment->documents=='transcript_document') selected @endif value="transcript_document">Transcript Document(University)</option>
                    <option @if($course_recruitment->documents=='work_experience_document') selected @endif value="work_experience_document">Work Experience Documents</option>
                    <option @if($course_recruitment->documents=='lor') selected @endif value="lor">LOR</option>
                    <option @if($course_recruitment->documents=='resume') selected @endif value="resume">Resume</option>
                    <option @if($course_recruitment->documents=='other') selected @endif value="other">Other</option>
                </select>
                
            <td>
                <select class="form-control" name="course_type[]">
                    <option value="">select type</option>
                    <option @if($course_recruitment->type=="pdf") selected @endif>pdf</option>
                    <option @if($course_recruitment->type=="jpg") selected @endif>jpg</option>
                    <option @if($course_recruitment->type=="doc") selected @endif>doc</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="course_status[]">
                    <option value="">select status</option>
                    <option @if($course_recruitment->status=="active") selected @endif value="active">Active</option>
                    <option @if($course_recruitment->status=="de-active") selected @endif value="de-active">De-Active</option>
                </select>
            </td>
            <td>
                <div class="icon-container">
                    <a class="btn btn-xs btn-danger delete-record" title="Delete"  data-id="{{$srno}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg><span class="icon-name"></span>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach  
        </tbody>
        <tfoot>
            <td colspan="5"><div class="well clearfix text-right">
        <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add More Document</a>
 </div></td>
        </tfoot>
      </table>
    </div> 
  
  <div style="display:none;">
    <table id="sample_table">
      <tr id="">
       <td><span class="sn"></span>.</td>
       <td>
            <select class="form-control" name="documents[]">
               <option value="">select document</option>
               <option value="photographs">Photographs</option>
               <option value="passport">Passport</option>
               <option value="10th">10th Documents</option>
               <option value="12th">12th Documents</option>
               <option value="diploma_document">Diploma Documents</option>
               <option value="bachelor_document">Bachelor Documents</option>
               <option value="master_document">Master Documents</option>
               <option value="transcript_document">Transcript Document(University)</option>
               <option value="work_experience_document">Work Experience Documents</option>
               <option value="lor">LOR</option>
               <option value="resume">Resume</option>
               <option value="other">Other</option>
            </select>
        </td>
       <td>
           <select class="form-control" name="type[]">
               <option value="">select type</option>
               <option>pdf</option>
               <option>jpg</option>
               <option>doc</option>
            </select>
        </td>
        <td>
           <select class="form-control" name="document_status[]">
               <option value="">select status</option>
               <option value="active">Active</option>
               <option value="de-active">De-Active</option>
            </select>
        </td>
       <td>
        <div class="icon-container">
            <a class="btn btn-xs btn-danger delete-record" title="Delete" data-id="0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg><span class="icon-name"></span>
            </a>
        </div>
        </td>
     </tr>
   </table>
 </div>
 
<script>
    jQuery(document).delegate('a.add-record', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table tr'),
     size = jQuery('#tbl_posts >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec-'+size);
     element.find('.delete-record').attr('data-id', size);
     element.appendTo('#tbl_posts_body');
     element.find('.sn').html(size);
   });

   jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      var course_requirementid=jQuery('#cr_' + id).val();
      let URL="{{ url('api/admin/course_requirement/delete/') }}/"+course_requirementid;
      if(course_requirementid){
         $.ajax(URL,
            {
                dataType: 'json', // type of response data
				success: function (data,status,xhr) {
                    
                }
            }
         );
      }
      jQuery('#rec-' + id).remove();
      
    //regnerate index number on table
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
</div>