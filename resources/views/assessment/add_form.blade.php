<input type="hidden" name="enquiry_id" value="{{$enquiry}}">
<div class="col-md-12">
<div class="table-responsive">


<table role="table" class="table table-bordered" id="tbl_posts">
  <thead role="rowgroup">
    <tr role="row">
      <th role="columnheader">ASSESSMENT</th>
      <th role="columnheader">Country</th>
      <th role="columnheader">Intake Year</th>
      <th role="columnheader">Intake Month</th>
      <th role="columnheader">University</th>
      <th role="columnheader">Course</th>
      <th role="columnheader">Specialization</th>
      <th role="columnheader">Program Link</th>
      <th role="columnheader">Level</th>
      <th role="columnheader">Duration</th>
      <th role="columnheader">Campus</th>
      <th role="columnheader">Entry Req</th>
      <th role="columnheader">App Fee</th>
      <th role="columnheader">App Deadline</th>
      <th role="columnheader">Tution Fee</th>
      <th role="columnheader">Scholarship</th>
      <th role="columnheader">Remark</th>
      <th role="columnheader">Action</th>
    </tr>
  </thead>
  <tbody role="rowgroup" id="tbl_posts_body">
    <tr id="rec-1" role="row">
    <td role="cell" class="text-center"><span class="sn">1</span>.</td>
      <td class="text-center" role="cell">
        <select name="country_id[]"  class="form-control">
                <option value="" selected>Select Country</option>
                @forelse ( get_country() as $uni)
                    <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
                @empty
                    <option value="#">No Country Avalible </option>
                @endforelse
            </select>
      </td>
      <td role="cell">
        <select name="intact_year_id[]" class="form-control">
            <option value="01">2021</option>
            <option value="02">2022</option>
        </select>
      </td>
      <td role="cell"> 
        <select name="intact_month_id[]" class="form-control">
            @forelse ($intake as $item_intack)
            <option value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
            @empty
            <option value="01">jan</option>
            @endforelse
        </select>
      </td>  
      <td role="cell">
            <select name="university_id[]" class="form-control">
                <option value="" selected>Select University</option>
                @forelse ( $university as $uni)
                    <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
                @empty
                    <option value="#">No University Avalible </option>
                @endforelse
            </select>
      </td>
      <td role="cell">
        <select name="course_id[]" class="form-control">
                <option value="" selected>Select Course</option>
                @forelse ( $course as $city)
                    <option value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
                @empty
                    <option value="#">No Course Avalible </option>
                @endforelse
            </select>
      </td>
      <td role="cell">
          <input type="text" name="specialization[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="program_link[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="level[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="duration[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="campus[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="entry_req[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="app_fee[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="app_deadline[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="tution_fee[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="scholarship[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" name="remarks[]" class="form-control">
      </td>
      <td role="cell">
            <a class="btn btn-xs btn-danger delete-record" title="Delete" data-id="1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg><span class="icon-name"></span>
            </a>
    </td>
    </tr>
   </tbody>
</table>
</div>
</div>

<div class="col-md-12 mt-3">
    <div class="text-right">
        <a class="btn btn-primary pull-right add-record" data-added="0">
            <i class="glyphicon glyphicon-plus"></i> Add Assessment
        </a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div style="display:none;">
    <table id="sample_table">
      <tr role="rowgroup" id="">
       <td class="text-center" role="cell"><span class="sn"></span>.</td>
       <td role="cell">
        <select id="country" name="country_id[]" class="form-control add_country">
                <option value="" selected>Select Country</option>
                @forelse ( get_country() as $uni)
                    <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
                @empty
                    <option value="#">No Country Avalible </option>
                @endforelse
            </select>
      </td>
      <td role="cell">
        <select name="intact_year_id[]" id="intact_year_id" class="form-control add_intact_year_id">
            <option value="01">2021</option>
            <option value="02">2022</option>
        </select>
      </td>
      <td role="cell"> 
        <select name="intact_month_id[]" id="intact_month_id" class="form-control add_intact_month_id">
            @forelse ($intake as $item_intack)
            <option value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
            @empty
            <option value="01">jan</option>
            @endforelse
        </select>
      </td>  
      <td role="cell">
            <select name="university_id[]" id="University" class="form-control add_university">
                <option value="" selected>Select University</option>
                @forelse ( $university as $uni)
                    <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
                @empty
                    <option value="#">No University Avalible </option>
                @endforelse
            </select>
      </td>
      <td role="cell">
        <select name="course_id[]" id="course_id" class="form-control add_course_id">
                <option value="" selected>Select Course</option>
                @forelse ( $course as $city)
                    <option value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
                @empty
                    <option value="#">No Course Avalible </option>
                @endforelse
            </select>
      </td>
      <td role="cell">
          <input type="text" id="specialization" name="specialization[]" class="form-control add_specialization">
      </td>
      <td role="cell">
          <input type="text" id="program_link" name="program_link[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="level" name="level[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="duration" name="duration[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="campus" name="campus[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="entry_req" name="entry_req[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="app_fee" name="app_fee[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="app_deadline" name="app_deadline[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="tution_fee" name="tution_fee[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="scholarship" name="scholarship[]" class="form-control">
      </td>
      <td role="cell">
          <input type="text" id="remarks" name="remarks[]" class="form-control">
      </td>
      <td role="cell">
        <a class="btn btn-xs btn-danger delete-record" title="Delete" data-id="0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg><span class="icon-name"></span>
            </a>
      </td>
      
     </tr>
   </table>
 </div>

<style>
    .form-control{
       width: 250px;
    }
    @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px)  {
		/* Force table to not be like tables anymore */
        .form-control{
       width: 100%;
    }
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 2%;
		}

		td:before {
			/* Now like a table header */
			/* Top/left values mimic padding */
			top: 0;
            bottom:5;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
            font-weight:800;
		}

		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
        td:nth-of-type(1):before { content: "ASSESSMENT"; }
		td:nth-of-type(2):before { content: "COUNTRY"; }
		td:nth-of-type(3):before { content: "INTAKE YEAR"; }
		td:nth-of-type(4):before { content: "INTAKE MONTH"; }
		td:nth-of-type(5):before { content: "UNIVERSITY"; }
		td:nth-of-type(6):before { content: "COURSE"; }
		td:nth-of-type(7):before { content: "SPECIALIZATION"; }
		td:nth-of-type(8):before { content: "PROGRAM LINk"; }
		td:nth-of-type(9):before { content: "LEVEL"; }
		td:nth-of-type(10):before { content: "DURATION"; }
		td:nth-of-type(11):before { content: "CAMPUS"; }
        td:nth-of-type(12):before { content: "ENTRY REQ"; }
        td:nth-of-type(13):before { content: "APP FEE"; }
        td:nth-of-type(14):before { content: "APP DEADLINE"; }
        td:nth-of-type(15):before { content: "TUTION FEE"; }
        td:nth-of-type(16):before { content: "SCHOLARSHIP"; }
        td:nth-of-type(17):before { content: "REMARK"; }
        td:nth-of-type(18):before { content: "ACTION"; }
	}
</style>

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


