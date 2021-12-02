<div class="row">
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="mandatory">Maritial Status</label>
            <Select class="form-control" name="marital_status" required>
                @foreach (config('espi.enquires_detail.marital_status') as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </Select>

        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Passport Number</label>
            <input type="text" class="form-control" value="{{ $enquiry->passport_no }}">

        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">Passport</label>
            <Select class="form-control" name="passport" required>
                <option value="yes" selected>Yes</option>
                <option value="no">no</option>
            </Select>
        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Country Interested</label>
            {{-- <input type="text" name="country_intrusted" id="name" value="" class="form-control tagging" required> --}}
            <select class="form-control tagging" multiple="multiple" name="country_intrusted[]">
                @foreach (config('espi.enquires_detail.country_interested') as $item)
                    <option value="{{ $item }}" @if ($enquiry->preferred_country == $item) selected @endif>{{ $item }}</option>

                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Reference Code</label>
            <input type="text" name="reference_code" id="ref_code" value="{{ $enquiry->reference_code }}" class="form-control" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Reference Name</label>
            <input type="text" name="reference_name" id="name" value="{{ $enquiry->reference_name }}" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Reference Phone</label>
            <input type="number" name="reference_phone" id="name" value="{{ $enquiry->reference_phone }}" class="form-control" required="">
        </div>
    </div>
</div>
