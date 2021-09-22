<div class="col-md-12">

    <div class="form-group">
        <label for="name">University / College Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
    </div>

</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="0" rows="5" class="form-control" required>{{old('description')}}</textarea>
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" cols="0" rows="5" class="form-control" required>{{old('address')}}</textarea>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" value="{{old('phone')}}" name="phone" id="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="web">Website</label>
        <input type="web" value="{{old('web')}}" name="web" id="web" class="form-control" placeholder="www.exampale.com" required>
    </div>

    <div class="form-group">
        <label for="default_assign_emp">Default Assign Emp</label>
        <input type="default_assign_emp" value="{{old('default_assign_emp')}}" name="default_assign_emp" id="default_assign_emp" class="form-control" placeholder="This Feature Comming" readonly required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="#" selected disabled>Status</option>
            <option value="active">Active</option>
        </select>
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <select name="country_id" id="country" class="form-control" required>
            @forelse ( get_country() as $country)
                <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
            @empty
                <option value="#">No Country Available </option>
            @endforelse
        </select>
    </div>

</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Intake Year</label>
        <select name="intake_year" class="form-control">
            @forelse ($intakeYear as $item_intake_month)
            <option value="{{ $item_intake_month->id }}">{{ $item_intake_month->year }}</option>
            @empty
            <option value="01">jan</option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Intake Month</label>
        <select name="intake_month" class="form-control">
            @forelse ($intake as $item_intack)
            <option value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
            @empty
            <option value="01">jan</option>
            @endforelse
        </select>
    </div>
</div>
<div class="col-md-12">
<hr>
<h5>
University General Requirement
<hr>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Academic %</label>
        <input type="text" name="d_req_aca_per" onkeypress="return isNumber(event)" id="d_req_aca_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Academic GPA</label>
        <input type="text" name="d_req_aca_gpa" onkeypress="return isNumber(event)" id="d_req_aca_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Language %</label>
        <input type="text" name="d_req_lan_per" onkeypress="return isNumber(event)" id="d_req_lan_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Diploma Requirement Language GPA</label>
        <input type="text" name="d_req_lan_gpa" onkeypress="return isNumber(event)" id="d_req_lan_gpa" class="form-control">
    </div>   
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Academic %</label>
        <input type="text" name="g_req_aca_per" onkeypress="return isNumber(event)" id="g_req_aca_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Academic GPA</label>
        <input type="text" name="g_req_aca_gpa" onkeypress="return isNumber(event)" id="g_req_aca_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Language %</label>
        <input type="text" name="g_req_lan_per" onkeypress="return isNumber(event)" id="g_req_lan_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Graduate Requirement Language GPA</label>
        <input type="text" name="g_req_lan_gpa" onkeypress="return isNumber(event)" id="g_req_lan_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Academic %</label>
        <input type="text" name="pg_req_aca_per" onkeypress="return isNumber(event)" id="pg_req_aca_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Academic GPA</label>
        <input type="text" name="pg_req_aca_gpa" onkeypress="return isNumber(event)" id="pg_req_aca_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Language %</label>
        <input type="text" name="pg_req_lan_per" onkeypress="return isNumber(event)" id="pg_req_lan_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Post Graduate Requirement Language GPA</label>
        <input type="text" name="pg_req_lan_gpa" onkeypress="return isNumber(event)" id="pg_req_lan_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Requirement Academic %</label>
        <input type="text" name="ten_req_aca_per" onkeypress="return isNumber(event)" id="ten_req_aca_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Requirement Academic GPA</label>
        <input type="text" name="ten_req_aca_gpa" onkeypress="return isNumber(event)" id="ten_req_aca_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Graduate Requirement Language %</label>
        <input type="text" name="ten_req_lan_per" onkeypress="return isNumber(event)" id="ten_req_lan_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">10th Requirement Language GPA</label>
        <input type="text" name="ten_req_lan_gpa" onkeypress="return isNumber(event)" id="ten_req_lan_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Requirement Academic %</label>
        <input type="text" name="twelve_req_aca_per" onkeypress="return isNumber(event)" id="twelve_req_aca_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Requirement Academic GPA</label>
        <input type="text" name="twelve_req_aca_gpa" onkeypress="return isNumber(event)" id="twelve_req_aca_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Graduate Requirement Language %</label>
        <input type="text" name="twelve_req_lan_per" onkeypress="return isNumber(event)" id="twelve_req_lan_per" class="form-control">
    </div>   
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">12th Requirement Language GPA</label>
        <input type="text" name="twelve_req_lan_gpa" onkeypress="return isNumber(event)" id="twelve_req_lan_gpa" class="form-control">
    </div>   
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="country">News Letter (PDF)</label>
        <input type="file" name="news_letter" id="news_letter" class="form-control">
    </div>   
</div>

<div class="col-md-12">
    <hr>
    <h5>
    Campus Details
    <hr>
</div>
<div class="col-md-12">
    <div id="campus_detail">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Campus Name</label>
                    <input type="text" name="campus_name[]" value="" class="form-control" required="">
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label for="country">Campus Country</label>
                    <select name="campus_country[]" class="form-control" required>
                        @forelse ( get_country() as $country)
                            <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                        @empty
                            <option value="#">No Country Available </option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Campus Address</label>
                    <textarea cols="1" rows="1" name="campus_address[]" value="" class="form-control" required=""></textarea>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Campus Fees</label>
                    <input type="text" name="campus_fees[]" onkeypress="return isNumber(event)"  value="" class="form-control" required="">
                </div>
            </div>
            
            <div class="col-md-1">
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
<a id="add_more_campus" class="btn btn-info" style="float: right;">Add More Campus</a>
</div>



