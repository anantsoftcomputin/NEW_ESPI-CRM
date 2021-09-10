<div class="col-md-12" id="user_exist" style="color:red">

</div>
<div class="col-md-6">
    {{-- row 1  --}}
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" required>
        <!-- <a style="margin-top:5px" onclick="otp_generate()" id="generate_otp">Generate OTP</a>
        <label class="error_msg" style='color:red'></label> -->
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
    </div>
</div>

<div class="col-md-6">
    {{-- row 1  --}}
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" min="1111111111" max="9999999999" value="{{old('phone')}}" name="phone" id="phone" class="form-control" required>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="education">Current Education Status</label>
        <select name="education" id="education" class="form-control">
            <option value="{{old('education')}} ?? ''" selected disabled>{{old('education') ?? "Current Education Status"}}</option>
            <option value="10th">10th</option>
            <option value="12th">12th</option>
            <option value="Under-Graduate">Under-Graduate</option>
            <option value="Graduate">Graduate</option>
            <option value="Post-Graduate">Post-Graduate</option>
            <option value="PHD/Doctorate">PHD/Doctorate</option>
        </select>
    </div>
</div>

{{-- row 2  --}}
    <div class="col-md-6">
    <div class="form-group">
        <label for="country">Country</label>
        <select name="country_id" id="country" class="form-control" required>
            <option value="{{old('country_id')}}">{{old("country_id")}}</option>
            @forelse ( get_country() as $country)
                <option @if(old("country_id") == $country->id) selected @endif value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
            @empty
                <option value="#">No Country Availabe </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="state">State</label>
        
        <select name="state_id" id="state" value="{{old('state_id')}}" class="form-control" required>
            <option value="{{old('state_id')}}">{{old("state_id")}}</option>
            @forelse ( get_state() as $state)
                <option @if(old("state_id") == $state->id) selected @endif value="{{ $state->id }}">{{ ucfirst($state->name) }}</option>
            @empty
                <option value="#">No state Availabe </option>
            @endforelse
        </select>
        {{-- <input type="text" name="state" id="state" class="form-control" required> --}}
    </div>
</div>

    {{-- row 3  --}}
    <div class="col-md-6">
    <div class="form-group">
        <label for="city">City</label>
        <select name="city_id" id="city" class="form-control" required>
        <option value="{{old('city_id')}}">{{old('city_id')}}</option>
            @forelse ( get_city() as $city)
                <option @if(old("city_id") == $city->id) selected @endif value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
            @empty
                <option value="#">No city Availabe </option>
            @endforelse
        </select>
    </div>
</div>


    {{-- row 2  --}}
   

    {{-- row 3  --}}
    <div class="col-md-6">
    <div class="form-group">
        <label for="city">Pincode</label>
        <input type="number" min="111111" value="{{old('postal_code')}}" max="999999" name="postal_code" id="postal_code" class="form-control" required>
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
        <label for="dob">DOB</label>
        <input type="date" value="{{old('dob')}}" name="dob" id="dob" class="form-control" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" value="{{old('gender')}}" id="gender" class="form-control" required>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="user">Select Counsellor</label>
        <select name="counsellor_id" value="{{old('user')}}" id="user" class="form-control" required>
            <option value="#" selected disabled>Select Counsellor</option>
            @foreach ($user as $item)
            <option @if(old("counsellor_id") == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Know About Us</label>
        <select name="referance_source" id="referance_source" class="form-control">
            <option value="">Know About Us</option>
			<option value="Facebook">Facebook</option>
			<option value="Instagram">Instagram</option>
			<option value="Newspaper">Newspaper</option>
			<option value="Google">Google</option>
			<option value="Hordings">Hordings</option>
			<option value="Reference" selected="">Reference</option>
			<option value="Seminar">Seminar</option>
			<option value="Agent">Agent</option>
			<option value="Classes">Classes</option>
        </select>
    </div>
</div>

<div class="col-md-6" id="ref_name_div">
    <label id="ref_name_label">Reference Name</label>
    <input type="text" name="referance_name" value="{{old('referance_name')}}" id="ref_name" class="form-control">
</div>

<div class="col-md-6" id="ref_phone_div">
    <label id="ref_phone_label">Reference Phone</label>
    <input type="text" name="referance_phone" value="{{old('referance_phone')}}" id="ref_phone" class="form-control">
</div>

<div class="col-md-6" id="ref_code_div"> 
    <label id="ref_code_label">Reference Code</label>
    <input type="text" name="referance_code" value="{{old('referance_code')}}" id="ref_code" class="form-control">
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="gender">Remarks</label>
        <input type="text" value="{{old('remarks')}}" name="remarks" id="remarks" class="form-control">
    </div>
</div>
<div class="col-md-12">
<div class="n-chk">
    <label class="new-control new-checkbox checkbox-primary">
      <input type="checkbox" class="new-control-input">
      <span class="new-control-indicator"></span>General Assessment
    </label>
</div>

<div class="row" id="general_assessment">

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Country</label>
        <select name="university_id" id="country" class="form-control" required>
            <option value="0" disabled selected>Select Country</option>
            @forelse ( get_country() as $uni)
                <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
            @empty
                <option value="#">No Country Avalible </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="university">University</label>
        <select name="university_id" id="University" class="form-control" required>
            <option value="0" disabled selected>Select University</option>
            @forelse ( $university as $uni)
                <option @if(old("university_id") == $uni->id) selected @endif value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
            @empty
                <option value="#">No University Avalible </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="course_id">Course</label>
        <select name="course_id" id="course_id" class="form-control" required>
            <option value="0" disabled selected>Select Course</option>
            @forelse ( $course as $city)
                <option @if(old("course_id") == $city->id) selected @endif value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
            @empty
                <option value="#">No Course Avalible </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="intact_month_id">Intake Month</label>
        {{-- <input type="intact_month" value="{{old('intact_month')}}" name="intact_month" id="intact_month" class="form-control" required> --}}
        <select name="intact_month_id" id="" class="form-control" required>
            @forelse ($intake as $item_intack)
                <option @if(old("intact_month") == $item_intack->id) selected @endif value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
            @empty
                <option value="01">jan</option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="intact_year_id">Intake Year</label>
        <select name="intact_year_id" id="intact_year_id" class="form-control" required>
            <option value="01" @if(old("intact_year_id") == "01") selected @endif>2021</option>
            <option value="02" @if(old("intact_year_id") == "02") selected @endif>2022</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="#" selected disabled>Status</option>
            {{-- <option value="approved">Approved</option> --}}
            <option value="process" @if(old("status") == "process") selected @endif selected>In Process</option>
            <option value="rejected" @if(old("status") == "rejected") selected @endif>Rejected</option>
            <option value="on-hold" @if(old("status") == "on-hold") selected @endif>On-Hold</option>
        </select>
    </div>
</div>

</div>
</div>






