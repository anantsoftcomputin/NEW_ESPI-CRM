<div class="wallpappar">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Occupation of Father</label>
                <input type="text" name="father_occupation" id="name" value="{{ $last->father_occupation }}" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Annual Income</label>
                <input type="text" name="annual_income" id="name" value="{{ $last->annual_income }}" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Rejection If any</label>
                <select name="rejection" id="rejection_if_any" class="form-control">
                    <option selected disabled>Rejection If any</option>
                    <option @isset($last->rejection) @if($last->rejection=="yes") selected @endif @endisset value="yes">Yes</option>
                    <option @isset($last->rejection) @if($last->rejection=="no") selected @endif @endisset value="no">no</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <div class="refusal_hide">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Refusal Country</label>
                    <input type="text" value="{{ $last->refusal_country }}" name="refusal_country" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Visa Category</label>
                    <input type="text" value="{{ $last->refusal_category }}" name="refusal_category" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Refusal Reason</label>
                    <input type="text" value="{{ $last->refusal_resion }}" name="refusal_resion" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Refusal Date</label>
                    <input type="date" name="refusal_date" class="form-control" value="{{ $last->refusal_date }}">
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 refusal_hide">
    <a class="btn btn-info" style="float: right;" id="refusal_add">Add Refusal</a>
</div>
