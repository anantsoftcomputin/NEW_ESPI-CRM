
<div class="col-md-12">

    <div class="form-group">
        <label for="name">University / College Name</label>
        <input type="text" name="name" id="name" value="{{$university->name ?? ''}}" class="form-control" required>
    </div>

</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="description">Remark</label>
        <textarea name="description" id="description" class="form-control" required>{{$university->description}}</textarea>
    </div>
</div>


{{-- <div class="col-md-12">
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" cols="0" rows="5" class="form-control" required>{{$university->address ?? ''}}</textarea>
    </div>
</div> --}}

<div class="col-md-6">
    {{-- <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" value="{{$university->phone ?? ''}}" name="phone" id="phone" class="form-control" required>
    </div> --}}
    <div class="form-group">
        <label for="web">Web</label>
        <input type="web" value="{{$university->web ?? ''}}" name="web" id="web" class="form-control" placeholder="www.exampale.com" required>
    </div>

    <div class="form-group">
        <label for="default_assign_emp">Default Assign Emp</label>
        <input type="default_assign_emp" value="{{old('default_assign_emp')}}" name="default_assign_emp" id="default_assign_emp" class="form-control" placeholder="This Feature Comming" readonly required>
    </div>


</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="{{$university->email ?? ''}}" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="#" >Status</option>
            <option value="active" @if($university->status=="active") selected @endif>Active</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Country</label>
        <select name="country_id" id="country" class="form-control" required>

            @forelse ( get_country() as $country)
                <option @if($university->country_id==$country->id) selected @endif value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
            @empty
                <option value="#">No Country Available </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-3">
    <div class="form-group">
        <label for="country">Intake Year</label>
        <select name="intake_year" class="form-control">
            @forelse ($intakeYear as $item_intake_month)
            <option @if($item_intake_month->id==$university->intake_year) selected @endif value="{{ $item_intake_month->id }}">{{ $item_intake_month->year }}</option>
            @empty
            <option value="01">jan</option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-3">
    <div class="form-group">
        <label for="country">Intake Month</label>
        <select name="intake_month" class="form-control">
            @forelse ($intake as $item_intack)
            <option @if($item_intack->id==$university->intake_month) selected @endif value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
            @empty
            <option value="01">jan</option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="provision_state">Provision State</label>
        <input type="text" name="provision_state" value="{{$university->provision_state}}" id="provision_state" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="provision_state">Application Fees</label>
        <input type="text" name="application_fees" value="{{$university->application_fees}}" onkeypress="return isNumber(event)" id="application_fees" class="form-control">
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
        <input type="text" name="ten_req" value="{{$university->ten_req}}" onkeypress="return isNumber(event)" id="ten_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="twelve_req">12th Academic %</label>
        <input type="text" name="twelve_req" value="{{$university->twelve_req}}" onkeypress="return isNumber(event)" id="twelve_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="bachelor_req">Bachelor %</label>
        <input type="text" name="bachelor_req" value="{{$university->bachelor_req}}" onkeypress="return isNumber(event)" id="bachelor_req" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="master_req">Master %</label>
        <input type="text" name="master_req" value="{{$university->master_req}}" onkeypress="return isNumber(event)" id="master_req" class="form-control">
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
        <input type="text" name="ists_req" value="{{$university->ists_req ?? ''}}" onkeypress="return isNumber(event)" id="ists_req" class="form-control">
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
    @if($university->news_letter)

    @endif
</div>

<div class="col-md-12">
    <hr>
    Campus Details
    <hr>
</div>
<div class="col-md-12">
    <div id="campus_detail">
        @php
        $srno=0;
        @endphp
        @foreach($university_campus as $university_campus)
        @php
        $srno++;
        @endphp
        <input type="hidden" id="cr_{{$university_campus->id}}" data-id="cr_{{$university_campus->id}}" name="university_campus_id[]" value="{{$university_campus->id}}">
        <div class="row" id="campus_row_{{$university_campus->id}}">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Campus Name</label>
                    <input type="text" name="university_campus_name[]" value="{{$university_campus->campus_name}}" class="form-control" required="">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="country">Campus Country</label>
                    <select name="university_campus_country[]" class="form-control" required>
                        @forelse ( get_country() as $country)
                            <option @if($university_campus->campus_country==$country->id) selected @endif value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                        @empty
                            <option value="#">No Country Available </option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Campus Address</label>
                    <textarea cols="1" rows="1" name="university_campus_address[]" value="" class="form-control" required="">{{$university_campus->campus_address}}</textarea>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Campus Fees</label>
                    <input type="text" name="university_campus_fees[]" onkeypress="return isNumber(event)"  value="{{$university_campus->campus_fees}}" class="form-control" required="">
                </div>
            </div>

            <div class="col-md-1">
                <div class="icon-container">
                    <br>
                    <a class="btn btn-xs btn-danger delete-record" title="Delete"  data-id="{{$university_campus->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <span class="icon-name"></span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="col-md-12">
<a id="add_more_campus" class="btn btn-info" style="float: right;">Add More Campus</a>
</div>
