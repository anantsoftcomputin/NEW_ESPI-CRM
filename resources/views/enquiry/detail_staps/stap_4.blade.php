<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Exam Status</label>
            <select class="form-control" id="exam_status" name="exam_status" onchange="toggle_exam_status(this)">
                <option value="">Select Exam Status</option>
                <option value="Completed">Completed</option>
                <option value="Planing">Planing</option>
            </select>
            {{-- <select class="form-control" name="last_education" onchange="toggle_last_education(this)">
               <option value="">Select Last Educatuion</option>
               <option value="10th">10th</option>
               <option value="Diploma">Diploma</option>
               <option value="12th">12th</option>
               <option value="Graduate">Graduate</option>
               <option value="Master">Master</option>
               <option value="PHD">PHD</option>
           </select> --}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Type of Exam</label>
            <select name="exam_type" class="form-control">
                    <option value="">Type of exam</option>
                    <option value="IELTS">IELTS</option>
                    <option value="TOELF">TOELF</option>
                    <option value="SAT">SAT</option>
                    <option value="GRE">GRE</option>
                    <option value="GMAT">GMAT</option>
                    <option value="PTE">PTE</option>
                    <option value="UKVI">UKVI</option>
                    <option value="IELTS GENERAL">IELTS GENERAL</option>
                    <option value="DUOLINGO">DUOLINGO</option>
                    <option value="SPOKEN ENGLISH">SPOKEN ENGLISH</option>
            </select>
        </div>
    </div>
</div>
<div class="row hiddan_data" style="display:none;">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Year of passing</label>
                <input type="text" name="online_exam_details_year_of_passing" id="name" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Percentage</label>
                <input type="text" name="online_exam_details_percentage" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name of Institute/School</label>
                <input type="text" name="online_exam_details_institute" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Medium of Education</label>
                <input type="number" name="online_exam_details_medium" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Board</label>
                <input type="text" name="name" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Backlogs</label>
                <input type="text" name="name" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Gap Information if You Have</label>
                <input type="text" name="name" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Gap Details During Education</label>
                <input type="text" name="name" id="name" value="" class="form-control" required="">
            </div>
        </div>
</div>

<div class="row hiddan_data_data" style="display:none;">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Planning Date</label>
            <input type="date" name="planning_date" id="name" class="form-control" required="">
        </div>
    </div>
</div>
