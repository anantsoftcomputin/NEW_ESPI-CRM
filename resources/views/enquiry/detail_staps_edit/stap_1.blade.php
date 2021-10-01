<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="mandatory">Maritial Status </label>
            <Select class="form-control" name="marital_status" required>
                @foreach (config('espi.enquires_detail.marital_status') as $item)
                    <option value="{{ $item }}" @if($item==$last->marital_status) selected @endif>{{ $item }}</option>
                @endforeach
                {{-- <option value="married">married</option> --}}
            </Select>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Passport</label>
            <Select class="form-control" name="passport" required>
                <option value="yes" selected>Yes</option>
                <option value="no" @if($item=="no") selected @endif >no</option>
            </Select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Country Interested</label>
            {{-- <input type="text" name="country_intrusted" id="name" value="" class="form-control tagging" required> --}}
            <select class="form-control tagging" multiple="multiple" name="country_intrusted[]">
                @foreach (get_country(0) as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
