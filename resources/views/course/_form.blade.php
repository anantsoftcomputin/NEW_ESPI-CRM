<div class="col-md-12">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
    </div>

</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="web">University</label>
        <select name="university_id" id="" class="form-control">
            <option value="#" selected disabled>Selet University</option>
            @foreach ($university as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="default_assign_emp">Default Assign Emp</label>
        <input type="default_assign_emp" value="{{old('default_assign_emp')}}" name="default_assign_emp" id="default_assign_emp" class="form-control" placeholder="This Feature Comming" readonly required>
    </div>
</div>
<div class="col-md-6">

    <div class="form-group">
        <label for="course_level">Level</label>
        <select name="course_level" id="course_level" class="form-control" required>
            <option value="#" selected disabled>Course Level</option>
            <option value="under-graduate">Under Graduate</option>
        </select>
    </div>


    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="#" selected disabled>Status</option>
            <option value="active">Active</option>
        </select>
    </div>




</div>
