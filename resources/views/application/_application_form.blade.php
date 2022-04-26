<div class="col-md-6">
    <div class="form-group">
        <label for="country">Contry</label>
        <select name="university_id" id="country" class="form-control" required>
            <option value="0" disabled selected>Select Contry</option>
            @forelse ( get_country() as $uni)
                <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
            @empty
                <option value="#">No University Availabe </option>
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
                <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
            @empty
                <option value="#">No University Availabe </option>
            @endforelse
        </select>
    </div>
</div>
<input type="hidden" name="enquiry_id" value="{{ $enquiry }}">
<div class="col-md-6">
    <div class="form-group">
        <label for="course_id">Course</label>
        <select name="course_id" id="course_id" class="form-control" required>
            <option value="0" disabled selected>Select Course</option>
            @forelse ( $course as $city)
                <option value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
            @empty
                <option value="#">No city Availabe </option>
            @endforelse
        </select>
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="intact_month_id">Intact Month</label>
        {{-- <input type="intact_month" value="{{old('intact_month')}}" name="intact_month" id="intact_month" class="form-control" required> --}}
        <select name="intact_month_id" id="" class="form-control" required>
            @forelse ($intake as $item_intack)
                <option value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
            @empty
                <option value="01">jan</option>
            @endforelse
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="intact_year_id">Intact Year</label>
        <select name="intact_year_id" id="intact_year_id" class="form-control" required>
            <option value="01">2021</option>
            <option value="02">2022</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="intact_year_id">Intact Year</label>
        <select name="intact_year_id" id="intact_year_id" class="form-control" required>
            <option value="01">2021</option>
            <option value="02">2022</option>
        </select>
    </div>
</div>
