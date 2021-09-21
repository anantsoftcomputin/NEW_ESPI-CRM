<h1>Work Experience</h1>
<div id="experience_detail_history">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Name of the company</label>
                <input type="text" name="work_company[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">From</label>
                <input type="date" name="work_from[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">To</label>
                <input type="date" name="to_work_from[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Work Profile</label>
                <input type="text" name="work_profile[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
<div class="col-md-12">
<a href="#" id="add_more_expiriance" class="btn btn-info" style="float: right;">Add More Experience</a>
</div>
<br><br><br>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Travel</label>
            <select class="form-control" id="travel_history_status" name="travel_history_status" onchange="travel_detail_history(this.value);">
                <option>select travel history</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
    </div>
</div>
<div id="travel_detail_history" class="travel_detail_history" style="display:none">
    <h1>Travel History</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Name of the country </label>
                <input type="text" name="travel_contry[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Visit Purpose</label>
                <input type="text" name="travel_purpose[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Duration Of Stay</label>
                <input type="text" name="travel_stay[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
<div class="row travel_detail_history" style="display: none;">
    <div class="col-md-12">
        <a href="#" id="add_more_history" class="btn btn-info" style="float: right;">Add More Travel</a>
    </div>
</div>
