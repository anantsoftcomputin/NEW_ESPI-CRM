<div class="col-md-12">

    <div class="form-group">
        <label for="name">University / College Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
    </div>

</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="description">Remark</label>
        <textarea name="description" id="description" cols="0" rows="5" class="form-control" required>{{old('description')}}</textarea>
    </div>
</div>



<div class="col-md-6">
    <div class="form-group">
        <label for="web">Website</label>
        <input type="web" value="{{old('web')}}" name="web" id="web" class="form-control" placeholder="www.exampale.com" required>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="#" selected disabled>Status</option>
            <option value="active">Active</option>
        </select>
    </div>

</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control" required>
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
        <label for="ten_req">10th Academic %</label>
        <input type="text" name="ten_req" value="{{$university->ten_req ?? '' }}" onkeypress="return isNumber(event)" id="ten_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="twelve_req">12th Academic %</label>
        <input type="text" name="twelve_req" value="{{$university->twelve_req ?? ''}}" onkeypress="return isNumber(event)" id="twelve_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="bachelor_req">Bachelor %</label>
        <input type="text" name="bachelor_req" value="{{$university->bachelor_req ?? ''}}" onkeypress="return isNumber(event)" id="bachelor_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="master_req">Master %</label>
        <input type="text" name="master_req" value="{{$university->master_req ?? ''}}" onkeypress="return isNumber(event)" id="master_req" class="form-control">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="master_req">SAT</label>
        <input type="text" class="form-control">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="master_req">GRE</label>
        <input type="text" class="form-control">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="master_req">GMAT</label>
        <input type="text" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="ists_req">IELTS</label>
        <input type="text" name="ists_req" id="ists_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="toefl_req">TOEFL</label>
        <input type="text" name="toefl_req" value="{{$university->toefl_req ?? ''}}" onkeypress="return isNumber(event)" id="toefl_req" class="form-control">
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="pte_req">PTE</label>
        <input type="text" name="pte_req" value="{{$university->pte_req ?? ''}}" onkeypress="return isNumber(event)" id="pte_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="duolingo_req">DUOLINGO</label>
        <input type="text" name="duolingo_req" value="{{$university->duolingo_req ?? ''}}" onkeypress="return isNumber(event)" id="duolingo_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
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



