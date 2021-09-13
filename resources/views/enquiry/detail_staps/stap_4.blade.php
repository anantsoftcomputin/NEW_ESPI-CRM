<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Exam Status</label>
            <select class="form-control" id="exam_status" name="exam_status" onchange="toggle_exam_status(this)">
                <option value="">Select Exam Status</option>
                <option value="Completed">Completed</option>
                <option value="Planning">Planning</option>
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
                    <option value="TOEFL">TOEFL</option>
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
                <label for="name">V/L Score</label>
                <input type="text" name="vl_score1" id="name" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Q/S Score</label>
                <input type="text" name="qs_score1" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">A/R Score</label>
                <input type="text" name="ar_score1" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Writing Score</label>
                <input type="number" name="writing_score" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Overall Score/Total</label>
                <input type="text" name="overall_score" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Exam Date</label>
                <input type="date" name="exam_date" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Consultancy/Institute Name</label>
                <input type="text" name="consultancy_name" id="name" value="" class="form-control" required="">
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
