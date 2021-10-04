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
            <label for="name">Country Interested </label>
            {{-- <input type="text" name="country_intrusted" id="name" value="" class="form-control tagging" required> --}}
            <select class="form-control tagging" multiple="multiple" name="country_intrusted[]">
                @foreach (config('espi.enquires_detail.country_interested') as $item)
                <option value="{{ $item }}"
                @isset($last->country_intrusted)
                    @if (in_array($item, $last->country_intrusted))
                    selected
                    @endif
                @endisset
                >{{ $item }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Reference Code</label>
            <input type="text" name="reference_code" id="ref_code" value="{{ $last->reference_code }}" class="form-control" required="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Reference Name</label>
            <input type="text" name="reference_name" id="name" value="{{ $last->reference_name }}" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Reference Phone</label>
            <input type="number" name="reference_phone" id="name" value="{{ $last->reference_phone }}" class="form-control" required="">
        </div>
    </div>
</div>
