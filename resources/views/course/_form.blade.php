<div class="col-md-12">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
    </div>

</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="web">University</label>
        <select name="university_id" id="" class="university form-control">
            <option value="#" selected disabled>Select University</option>
            @foreach ($university as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="default_assign_emp">Default Assign Emp</label>
        <input type="default_assign_emp" value="{{old('default_assign_emp')}}" name="default_assign_emp" id="default_assign_emp" class="form-control" placeholder="This Feature Comming" readonly required>
    </div>
</div>
<div class="col-md-6">

    <div class="form-group">
        <label for="course_level">Level</label>
        <select name="course_level" id="course_level" class="level form-control" required>
            <option value="#" selected disabled>Course Level</option>
            <option value="under-graduate">Under Graduate</option>
            <option value="diploma">Diploma</option>
            <option value="advance-diploma">Advance Diploma</option>
            <option value="bachelor">Bachelor</option>
            <option value="post-graduate-diploma">Post Graduate Diploma</option>
            <option value="master">Master</option>
        </select>
    </div>


    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="#" selected disabled>Status</option>
            <option value="active">Active</option>
            <option value="de-active">De-Active</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="course_duration">Course Duration</label>
        <input type="text" name="duration" id="duration" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Course Link</label>
        <input type="text" name="course_link" id="course_link" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="course_duration">Application Fees</label>
        <input type="text" name="application_fees" id="application_fees" class="form-control">
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
        <label for="ten_req">10th Academic %</label>
        <input type="text" name="ten_req" value="" onkeypress="return isNumber(event)" id="ten_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="twelve_req">12th Academic %</label>
        <input type="text" name="twelve_req" value="" onkeypress="return isNumber(event)" id="twelve_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="bachelor_req">Bachelor %</label>
        <input type="text" name="bachelor_req" value="" onkeypress="return isNumber(event)" id="bachelor_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="master_req">Master %</label>
        <input type="text" name="master_req" value="" onkeypress="return isNumber(event)" id="master_req" class="form-control">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="ists_req">ISTS</label>
        <input type="text" name="ists_req" onkeypress="return isNumber(event)" id="ists_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="pte_req">PTE</label>
        <input type="text" name="pte_req" onkeypress="return isNumber(event)" id="pte_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="duolingo_req">DUOLINGO</label>
        <input type="text" name="duolingo_req" onkeypress="return isNumber(event)" id="duolingo_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="toefl_req">TOEFL</label>
        <input type="text" name="toefl_req" onkeypress="return isNumber(event)" id="toefl_req" class="form-control">
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
               <option value="Photographs">Photographs</option>
               <option value="Passport">Passport</option>
               <option value="10th Documents">10th Documents</option>
               <option value="12th Documents">12th Documents</option>
               <option value="Diploma Documents">Diploma Documents</option>
               <option value="Bachelor Documents">Bachelor Documents</option>
               <option value="Master Documents">Master Documents</option>
               <option value="Transcript Document(University)">Transcript Document(University)</option>
               <option value="Work Experience Documents">Work Experience Documents</option>
               <option value="LOR">LOR</option>
               <option value="Resume">Resume</option>
               <option value="Other">Other</option>
            </select>
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
