@extends('layouts.theam')

@section('title')
Add User
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">{{ __('Upload Documents') }}</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(session()->has("fileerrors"))
                    <div class="alert alert-danger">
                              <?=session()->get("fileerrors")?></li>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('uploaddocument.store') }}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="assessments_id" value="{{$assessment_id}}">
                        <input type="hidden" name="course_id" value="{{$course_id}}">
                    @foreach($CourseRecruitments as $CourseRecruitment)
                    <input type="hidden" name="course_recruitment_id[]" value="{{$CourseRecruitment->id}}">
                    <input type="hidden" name="type[]" value="{{$CourseRecruitment->type}}">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{$CourseRecruitment->documents}} Valid File Type ({{$CourseRecruitment->type}})</label>
                            <br>
                                <span class="input-group-btn">
                                    <input  type="file" name="filename[]" accept="application/pdf" data-input="thumbnail{{$CourseRecruitment->id}}" data-preview="holder" class="lfm btn btn-primary">
                                </span>
                                <input required id="thumbnail{{$CourseRecruitment->id}}" class="form-control" type="hidden" name="filepath[]" class="form-control">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>
                    @endforeach
                    <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                    <input type="button" class="btn btn-danger" value="{{ __('enquire.cancel_btn_btn') }}">
                    </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('js')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('.lfm').filemanager('Files');
</script>
@endsection
