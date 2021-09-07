@foreach($CourseRecruitments as $cr)
<div class="col-md-12">
    <div class="form-group">
        <label for="country">{{$cr->documents}} File Type ({{$cr->type}})</label>
        <input type="file" name="document[]" class="form-control-file">
    </div>
</div>
@endforeach

<div class="input-group">
    <input type="text" id="image_label" class="form-control" name="image" aria-label="Image"
        aria-describedby="button-image">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
    </div>
</div>


