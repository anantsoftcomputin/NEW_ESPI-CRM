<div class="col-md-6">

    <div class="form-group">
        <label for="country">University</label>
        <select name="country_id" id="country" class="form-control" required>
            @forelse ( get_country() as $country)
                <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
            @empty
                <option value="#">No Country Availabe </option>
            @endforelse
        </select>
    </div>

    <div class="form-group">
        <label for="city">Course</label>
        <select name="city_id" id="city" class="form-control" required>
            @forelse ( get_city() as $city)
                <option value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
            @empty
                <option value="#">No city Availabe </option>
            @endforelse
        </select>
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
