<div class="col-md-6">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="name">Passport Number</label>
        <input type="text" name="passport_number" value="{{old('passport_number') ? old('passport_number') : "123456789"}}" id="passport_number" class="form-control" required>
    </div>
</div>

<div class="col-md-6">

    {{-- row 1  --}}
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" required>
    </div>
    {{-- row 2  --}}
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
    {{-- row 3  --}}
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
    {{-- row 2  --}}
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
    {{-- row 3  --}}
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
