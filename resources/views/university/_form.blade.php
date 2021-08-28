<div class="col-md-6">

    <div class="form-group">
        <label for="name">Name</label>
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
        <label for="web">Web</label>
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
                <option value="#">No Country Availabe </option>
            @endforelse
        </select>
    </div>

</div>
