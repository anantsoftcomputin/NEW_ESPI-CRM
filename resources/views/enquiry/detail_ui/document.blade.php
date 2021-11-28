<div class="p-2">
    <div class="row">
        <div class="col-md-3">
            @if ($enquiry->Details->data->passport_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->passport_file }}" class="img-fluid img-thumbnail">
                    <h6>Passport</h6>
                </div>
            @else
                <h6>Passport not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->ten_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->ten_file }}" class="img-fluid img-thumbnail">
                    <h6>10th</h6>
                </div>
            @else
                <h6>10th not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->diploma_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->diploma_file }}" alt="" class="img-fluid img-thumbnail">
                    <h6>Diploma</h6>
                </div>
            @else
                <h6>Diploma not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->bachelor_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->bachelor_file }}" alt="" class="img-fluid img-thumbnail">
                    <h6>Bachelor</h6>
                </div>
            @else
                <h6>Bachelor file not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->master_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->master_file }}" alt="" class="img-fluid img-thumbnail">
                    <h6>Master</h6>
                </div>
            @else
                <h6>Master file not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->phd_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->phd_file }}" alt="" class="img-fluid img-thumbnail">
                    <h6>PHD</h6>
                </div>
            @else
                <h6>PHD file not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->transcript_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->transcript_file}}" alt="" class="img-fluid img-thumbnail">
                    <h6>Transcript</h6>
                </div>
            @else
                <h6>Transcript file not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->experience_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->experience_file}}" alt="" class="img-fluid img-thumbnail">
                    <h6>Experience</h6>
                </div>
            @else
                <h6>Experience file not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->lor_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->lor_file}}" alt="" class="img-fluid img-thumbnail">
                    <h6>Lor</h6>
                </div>
            @else
                <h6>Lor file not uploded yet</h6>
            @endif
        </div>
        <div class="col-md-3">
            @if ($enquiry->Details->data->resume_file)
                <div class="text-center mt-1">
                    <img src="{{ $enquiry->Details->data->resume_file}}" alt="" class="img-fluid img-thumbnail">
                    <h6>Resume</h6>
                </div>
            @else
                <h6>Resume file not uploded yet</h6>
            @endif

        </div>
    </div>

</div>

