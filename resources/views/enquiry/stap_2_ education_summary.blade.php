<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Select Last Educatuion</label>
            <select class="form-control" name="last_education" onchange="toggle_last_education(this)">
               <option value="">Select Last Educatuion</option>
               <option value="10th">10th</option>
               <option value="Diploma">Diploma</option>
               <option value="12th">12th</option>
               <option value="Graduate">Graduate</option>
               <option value="Master">Master</option>
               <option value="PHD">PHD</option>
           </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Degree</th>
                    <th>Degree Name/Stream</th>
                    <th>Year of passing</th>
                    <th>percentage</th>
                    <th>Name of Institute</th>
                    <th>Medium of Education</th>
                    <th>Degree University</th>
                    <th>Backlogs</th>
                </tr>
            </thead>
            <tbody>
                <tr class="row_education">
                    <th><h2>10<sup>TH</sup></h2></th>
                    <th><input type="text" class="form-control"></th>
                    <th><input type="text" class="form-control"></th>
                    <th><input type="text" class="form-control"></th>
                    <th><input type="text" class="form-control"></th>
                    <th><input type="text" class="form-control"></th>
                    <th><input type="text" class="form-control"></th>
                    <th><input type="text" class="form-control"></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row" style="display: none;">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Year of passing </label>
            <input type="text" name="educatuion_year_of_passing" id="name" value="" class="form-control" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Percentage</label>
            <input type="text" name="educatuion_percentage" id="name" value="" class="form-control" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name of Institute/School</label>
            <input type="text" name="educatuion_institute" id="name" value="" class="form-control" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Medium of Education</label>
            <input type="number" name="educatuion_medium" id="name" value="" class="form-control" required="">
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


{{-- ready code --}}

<div id="master_detail" style="display: block;">
    <div class="text-center">
        <strong style="font-size: 35px;">Master Details</strong>
    </div>
    <div class="wizard-form-input select-caret">
        <label>Degree</label>
        <select name="master_stream">
            <option value="">Degree/Stream</option>
            <option value="MBA">MBA</option>
            <option value="MCOM">MCOM</option>
            <option value="ME">ME</option>
            <option value="MTECH">MTECH</option>
            <option value="MA">MA</option>
            <option value="MCA">MCA</option>
            <option value="MSC">MSC</option>
            <option value="MPharma">MPharma</option>
            <option value="MEd">MEd</option>
        </select>
    </div>
    <div class="wizard-form-input">
        <label>Degree Name/Stream</label>
        <input type="text" name="master_degree_name">
    </div>
    <div class="wizard-form-input">
        <label>Year of passing</label>
        <input type="text" name="master_degree_passing">
    </div>
    <div class="wizard-form-input">
        <label>percentage</label>
        <input type="text" name="master_degree_pass_percentage">
    </div>
    <div class="wizard-form-input">
        <label>Name of Institute</label>
        <input type="text" name="master_degree_institute">
    </div>
    <div class="wizard-form-input">
        <label>Medium of Education</label>
        <input type="text" name="master_degree_education">
    </div>
    <div class="wizard-form-input">
        <label>Degree University</label>
        <input type="text" name="master_degree_university">
    </div>
    <div class="wizard-form-input">
        <label>Backlogs</label>
        <input type="text" name="master_degree_backlog">
    </div>
</div>
<div id="degree_detail" style="display: block;">
    <div class="text-center">
        <strong style="font-size: 35px;">Graduate Details</strong>
    </div>
    <div class="wizard-form-input select-caret">
        <label>Degree</label>
        <select name="degree_stream">
            <option value="">Degree/Stream</option>
            <option value="BBA">BBA</option>
            <option value="BMS">BMS</option>
            <option value="BFA">BFA</option>
            <option value="BEM">BEM</option>
            <option value="LLB">LLB</option>
            <option value="BFD">BFD</option>
            <option value="BSW">BSW</option>
            <option value="BBS">BBS</option>
            <option value="BTTM">BTTM</option>
            <option value="BA">BA</option>
            <option value="BE">BE</option>
            <option value="BTECH">BTECH</option>
            <option value="BArch">BArch</option>
            <option value="BSC">BSC</option>
            <option value="BCA">BCA</option>
            <option value="BPharma">BPharma</option>
            <option value="BDS">BDS</option>
            <option value="BPT">BPT</option>
            <option value="BCOM">BCOM</option>
            <option value="BEd">BEd</option>
            <option value="CA">CA</option>
            <option value="CS">CS</option>
        </select>
    </div>
    <div class="wizard-form-input">
        <label>Degree Name/Stream</label>
        <input type="text" name="degree_name">
    </div>
    <div class="wizard-form-input">
        <label>Year of passing</label>
        <input type="text" name="degree_passing">
    </div>
    <div class="wizard-form-input">
        <label>percentage</label>
        <input type="text" name="degree_pass_percentage">
    </div>
    <div class="wizard-form-input">
        <label>Name of Institute</label>
        <input type="text" name="degree_institute">
    </div>
    <div class="wizard-form-input">
        <label>Medium of Education</label>
        <input type="text" name="degree_education">
    </div>
    <div class="wizard-form-input">
        <label>Degree University</label>
        <input type="text" name="degree_university">
    </div>
    <div class="wizard-form-input">
        <label>Backlogs</label>
        <input type="text" name="degree_backlog">
    </div>
</div>
<div id="hsc_detail" style="display: block;">
    <div class="text-center">
        <strong style="font-size: 35px">12th Details</strong>
    </div>
    <div class="wizard-form-input select-caret">
        <label>Stream</label>
        <select name="hsc_stream">
            <option value="">Stream</option>
            <option value="Science">Science</option>
            <option value="Commerce">Commerce</option>
            <option value="Arts">Arts</option>
        </select>
    </div>
    <div class="wizard-form-input">
        <label>Year of passing</label>
        <input type="text" name="hsc_passing">
    </div>
    <div class="wizard-form-input">
        <label>percentage</label>
        <input type="text" name="hsc_pass_percentage">
    </div>
    <div class="wizard-form-input">
        <label>Name of Institute/School</label>
        <input type="text" name="hsc_institute">
    </div>
    <div class="wizard-form-input">
        <label>Medium of Education</label>
        <input type="text" name="hsc_education">
    </div>
    <div class="wizard-form-input">
        <label>Board</label>
        <input type="text" name="hsc_board">
    </div>
    <div class="wizard-form-input">
        <label>Backlogs</label>
        <input type="text" name="hsc_backlog">
    </div>
</div>
<div id="diploma_detail" style="display: block;">
    <div class="text-center">
        <strong style="font-size: 35px">Diploma Details</strong>
    </div>
    <div class="wizard-form-input">
        <label>Year of Starting</label>
        <input type="text" name="diploma_starting">
    </div>
    <div class="wizard-form-input">
        <label>Year of passing</label>
        <input type="text" name="diploma_passing">
    </div>
    <div class="wizard-form-input">
        <label>percentage</label>
        <input type="text" name="diploma_pass_percentage">
    </div>
    <div class="wizard-form-input">
        <label>Name of Institute</label>
        <input type="text" name="diploma_institute">
    </div>
    <div class="wizard-form-input">
        <label>Medium of Education</label>
        <input type="text" name="diploma_education">
    </div>
    <div class="wizard-form-input">
        <label>Name of Course</label>
        <input type="text" name="diploma_course">
    </div>

    <div class="wizard-form-input">
        <label>Backlogs</label>
        <input type="text" name="diploma_backlog">
    </div>
</div>
<div id="ssc_detail" style="display: block;">
    <div class="text-center">
        <strong style="font-size: 35px">10th Details</strong>
    </div>
    <div class="wizard-form-input">
        <label>Year of passing</label>
        <input type="text" name="ssc_passing">
    </div>
    <div class="wizard-form-input">
        <label>percentage</label>
        <input type="text" name="ssc_pass_percentage">
    </div>
    <div class="wizard-form-input">
        <label>Name of Institute/School</label>
        <input type="text" name="ssc_institute">
    </div>
    <div class="wizard-form-input">
        <label>Medium of Education</label>
        <input type="text" name="ssc_education">
    </div>
    <div class="wizard-form-input">
        <label>Board</label>
        <input type="text" name="ssc_board">
    </div>
    <div class="wizard-form-input">
        <label>Backlogs</label>
        <input type="text" name="ssc_backlog">
    </div>
</div>

