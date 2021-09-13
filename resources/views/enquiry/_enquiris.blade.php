
<div class="col-md-12" id="user_exist" style="color:red">

</div>
<div class="col-md-6">
    {{-- row 1  --}}
    <div class="form-group">
        <label for="email" class="mandatory">Email</label>
        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" required>
        <!-- <a style="margin-top:5px" onclick="otp_generate()" id="generate_otp">Generate OTP</a>
        <label class="error_msg" style='color:red'></label> -->
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="name" class="mandatory">Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
    </div>
</div>

<div class="col-md-6">
    {{-- row 1  --}}
    <div class="form-group">
        <label for="phone" class="mandatory">Phone</label>
        <input type="number" min="1111111111" max="9999999999" maxlength="10" value="{{old('phone')}}" name="phone" id="phone" class="form-control" required>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="education">Current Education Status</label>
        <select name="education" id="education" class="form-control">
            <option value="" disabled>Current Education Status</option>
            <option @if(old('education') == "10th") selected @endif value="10th">10th</option>
            <option @if(old('education') == "diploma") selected @endif value="diploma">Diploma</option>
            <option @if(old('education') == "12th") selected @endif value="12th">12th</option>
            <option @if(old('education') == "Under-Graduate") selected @endif value="Under-Graduate">Under-Graduate</option>
            <option @if(old('education') == "Graduate") selected @endif value="Graduate">Graduate</option>
            <option @if(old('education') == "Post-Graduate") selected @endif value="Post-Graduate">Post-Graduate</option>
            <option @if(old('education') == "PHD/Doctorate") selected @endif value="PHD/Doctorate">PHD/Doctorate</option>
        </select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="address" class="mandatory">Address</label>
        <textarea name="address" id="address" cols="0" rows="5" class="form-control" required>{{old('address')}}</textarea>
    </div>
</div>


{{-- row 2  --}}
    <div class="col-md-6">
    <div class="form-group">
        <label for="country" class="mandatory">Country</label>
        <select name="country_id" id="country" class="form-control" required>
            
            @forelse ( get_country() as $country)
                <option @if($country->id==101) selected @endif @if(old("country_id") == $country->id) selected @endif value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
            @empty
                <option value="#">No Country Available </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="state" class="mandatory">State</label>

        <select name="state_id" id="state" class="form-control" required>
            <option value="{{old('state_id')}}">{{old("state_id")}}</option>
            @forelse ( get_state() as $state)
                <option @if(old("state_id") == $state->id) selected @endif value="{{ $state->id }}">{{ ucfirst($state->name) }}</option>
            @empty
                <option value="#">No state Available </option>
            @endforelse
        </select>
        {{-- <input type="text" name="state" id="state" class="form-control" required> --}}
    </div>
</div>

    {{-- row 3  --}}
<div class="col-md-6">
    <div class="form-group">
        <label for="city" class="mandatory">City</label>
        <select name="city_id" id="city" class="form-control" required>
        <option value="{{old('city_id')}}">{{old('city_id')}}</option>
            @forelse ( get_city() as $city)
                <option @if(old("city_id") == $city->id) selected @endif value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
            @empty
                <option value="#">No city Available </option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="pincode"  >Pincode</label>
        <input type="number" min="111111" value="{{old('postal_code')}}" max="999999" name="postal_code" id="postal_code" class="form-control" required>
    </div>
</div>



<div class="col-md-6">
    <div class="form-group">
        <label for="dob" class="mandatory">DOB</label>
        <input type="date" value="{{old('dob')}}" name="dob" class="form-control" required>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="gender" class="mandatory">Gender</label>
        <select name="gender" value="{{old('gender')}}" id="gender" class="form-control" required>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
    <label for="name">Preferred Country</label>
    {{-- <input type="text"   value="" class="form-control tagging" required> --}}
    <select class="form-control tagging" name="preferred_country" id="preferred_country">
    @foreach (get_country(0) as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
    </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="user" class="mandatory">Select Counsellor</label>
        <select name="counsellor_id" value="{{old('user')}}" id="user" class="form-control" required>
            <option value="" selected>Select Counsellor</option>
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
            <option value="" selected>Know About Us</option>
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

<div class="col-md-6" id="ref_code_div">
    <div class="form-group">
        <label id="ref_code_label">Reference Code</label>
        <input type="text" name="reference_code" value="{{old('reference_code')}}" id="ref_code" class="form-control">
    </div>
</div>

<div class="col-md-6" id="ref_name_div">
    <div class="form-group">
    <label id="ref_name_label">Reference Name</label>
    <input type="text" name="reference_name" value="{{old('reference_name')}}" id="ref_name" class="form-control">
    </div>
</div>

<div class="col-md-6" id="ref_phone_div">
    <div class="form-group">
        <label id="ref_phone_label">Reference Phone</label>
        <input type="text" name="reference_phone" value="{{old('reference_phone')}}" id="ref_phone" class="form-control">
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="gender">Remarks</label>
        <input type="text" value="{{old('remarks')}}" name="remarks" id="remarks" class="form-control">
    </div>
</div>






