

<h3>Work Experience</h3>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Work Experience </label>
            <select class="form-control" id="experience_status" name="experience_status" >
                <option>select work experience</option>
                <option @if ($last->experience_status=="Yes") selected @endif>Yes</option>
                <option @if ($last->experience_status=="No") selected @endif>No</option>
            </select>
        </div>
    </div>
</div>

<div id="experience_detail_history" style="display:@if ($last->experience_status=="Yes") block @else none @endif;">
    @for ($i=0; $i<count($last->work_company); $i++)
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Name of the company </label>
                    <input type="text" name="work_company[]" id="name" value="{{ $last->work_company[$i] }}" class="form-control" required="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">From</label>
                    <input type="date" name="work_from[]" id="name" value="{{ $last->work_from[$i] }}" class="form-control" required="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">To</label>
                    <input type="date" name="to_work_from[]" id="name" value="{{ $last->to_work_from[$i] }}" class="form-control" required="">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Work Profile</label>
                    <input type="text" name="work_profile[]" id="name" value="{{ $last->work_profile[$i] }}" class="form-control" required="">
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    @endfor
</div>

<div class="col-md-12" >
<a id="add_more_expiriance" class="btn btn-info" style="float: right; display:@if($last->experience_status=="Yes") block @else none @endif;">Add More Experience</a>
</div>

<br><br><br>
<h3>Travel</h3>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Travel</label>
            <select class="form-control" id="travel_history_status" name="travel_history_status" onchange="travel_detail_history(this.value);">
                <option>Select Travel History</option>
                <option @if ($last->travel_history_status=="Yes") selected @endif>Yes</option>
                <option @if ($last->travel_history_status=="No") selected @endif>No</option>
            </select>
        </div>
    </div>
</div>
<div id="travel_detail_history" class="travel_detail_history" style="display:@if ($last->travel_history_status=="Yes") block @else none @endif;">
    <h3>Travel History</h3>
        @for ($i=0; $i<count($last->travel_contry); $i++)
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Name of the country </label>
                        <input type="text" name="travel_contry[]" id="name" value="{{ $last->travel_contry[$i] }}" class="form-control" required="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Visit Purpose</label>
                        <input type="text" name="travel_purpose[]" id="name" value="{{ $last->travel_purpose[$i] }}" class="form-control" required="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Duration Of Stay</label>
                        <input type="text" name="travel_stay[]" id="name" value="{{ $last->travel_stay[$i] }}" class="form-control" required="">
                    </div>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        @endfor
</div>
<div class="row travel_detail_history" style="display: @if($last->travel_history_status=="Yes") block @else none @endif;;">
    <div class="col-md-12">
        <a id="add_more_history" class="btn btn-info" style="float: right;">Add More Travel</a>
    </div>
</div>
