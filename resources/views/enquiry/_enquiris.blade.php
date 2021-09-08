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
    <div class="form-group">
        <label for="education">Current Education Status</label>
        <select name="education" id="education" class="form-control">
            <option value="" selected disabled>Current Education Status</option>
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
            <option value="#" selected disabled>Select Country</option>
            @forelse ( get_country() as $country)
                <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
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
            @forelse ( get_state() as $state)
                <option value="{{ $state->id }}">{{ ucfirst($state->name) }}</option>
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
            @forelse ( get_city() as $city)
                <option value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
            @empty
                <option value="#">No city Availabe </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    {{-- row 1  --}}
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" min="1111111111" max="9999999999" value="{{old('phone')}}" name="phone" id="phone" class="form-control" required>
    </div>
</div>
    {{-- row 2  --}}
   

    {{-- row 3  --}}
    <div class="col-md-6">
    <div class="form-group">
        <label for="city">Pincode</label>
        <input type="number" min="111111" value="{{old('pin_code')}}" max="999999" name="pin_code" id="pin_code" class="form-control" required>
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
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="country">Know About Us</label>
        <select name="referance_source" id="referance_source" class="form-control" required>
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
    <input type="text" name="referance_name" id="ref_name" class="form-control">
</div>

<div class="col-md-6" id="ref_phone_div">
    <label id="ref_phone_label">Reference Phone</label>
    <input type="text" name="referance_phone" id="ref_phone" class="form-control">
</div>

<div class="col-md-6" id="ref_code_div"> 
    <label id="ref_code_label">Reference Code</label>
    <input type="text" name="referance_code" id="ref_code" class="form-control">
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="gender">Remarks</label>
        <input type="text" value="{{old('remarks')}}" name="remarks" id="remarks" class="form-control">
    </div>
</div>




