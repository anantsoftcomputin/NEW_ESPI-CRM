@extends('layouts.theam')

@section('js')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script>
     $(".tagging").select2({
        tags: false
    });
</script>
@endsection

@section('title')
Add Assessment
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">{{ __('Apply Assessment') }}</div>
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
                        <form method="POST" action="{{ route('assessments.store') }}">
                        @csrf
                        <div class="row">
                            <input value="{{ $Course->University->Country->id }}" type="hidden" name="country_id[]">
                            <input value="{{ $Course->id }}" type="hidden" name="course_id[]">
                            <input value="{{ $Course->University->id }}" type="hidden" name="university_id[]">

                            <div class="col-md-6">
                                <label for="selectyear">Course Name</label>
                                <input class="form-control" type="text" name="" id="" value="{{ $Course->name }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="selectyear">University Name</label>
                                <input class="form-control" type="text" name="" id="" value="{{ $Course->University->name }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="selectyear">Specialization Name</label>
                                <input class="form-control" type="text" name="specialization[]" id="" value="{{ $Course->specialization }}">
                            </div>
                            <div class="col-md-6">
                                <label for="selectyear">Level Name</label>
                                <input class="form-control" type="text" name="level[]" id="" value="{{ $Course->level }}">
                            </div>
                            <div class="col-md-6">
                                <label for="selectyear">Duration</label>
                                <input class="form-control" type="text" name="duration[]" id="" value="{{ $Course->duration }}">
                            </div>
                            <div class="col-md-6">
                                <label for="selectyear">App Fee</label>
                                <input class="form-control" type="number" name="app_fee[]" id="" value="{{ $Course->app_fee }}">
                            </div>
                            <div class="col-md-6">
                                <label for="selectyear">Tution Fee</label>
                                <input class="form-control" type="number" name="tution_fee[]" id="" value="{{ $Course->tution_fee }}">
                            </div>
                            <div class="col-md-6">
                                <label for="selectyear">Remarks</label>
                                <input class="form-control" type="text" name="tution_fee[]" id="" value="{{ $Course->tution_fee }}">
                            </div>
                            <div class="col-md-6">
                                <label for="selectyear">Course Link</label>
                                <input class="form-control" type="text" name="tution_fee[]" id="" value="{{ $Course->course_link }}">
                            </div>

                            <div class="col-md-6">
                                <label for="labale" class="form-label">Select Student</label>
                                <select class="form-control tagging" name="enquiry_id" id="preferred_country" required>
                                    <option selected disabled>Please Select Student</option>
                                    @forelse ($enquiry as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="" disabled selected>No Student yet</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="selectyear">Select Year</label>
                                <select name="intact_year_id" class="form-control" id="selectyear">
                                    <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                    <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
                                    <option value="{{ date('Y')+2 }}">{{ date('Y')+2 }}</option>
                                    <option value="{{ date('Y')+3 }}">{{ date('Y')+3 }}</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="selectmonth">Select Month</label>
                                <select name="intact_month_id[]" class="form-control" id="selectmonth">
                                    @forelse ($intake as $item_intack)
                                        <option value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
                                    @empty
                                        <option value="01">Jan</option>
                                    @endforelse
                                </select>
                            </div>


                            <div class="col-md-12 text-center mt-3">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <a href="{{route('Course.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
