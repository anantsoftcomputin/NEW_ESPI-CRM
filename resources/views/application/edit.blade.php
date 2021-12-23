@extends('layouts.theam');

@section('title')
Edit Application
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">Application Edit</div>
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
                    <form method="POST" action="{{ route('Application.update',$Application->id) }}">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">University</label>
                                    <input type="text" readonly class="form-control" value="{{ $university->name }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Course</label>
                                    <input type="text" readonly class="form-control" value="{{ $course->name }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="intact_month_id">Intake Month</label>
                                    <input type="intact_month" readonly value="{{ $intact->month }}" name="intact_month" id="intact_month" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="intact_year_id">Intake Year</label>
                                    <input type="intact_month" readonly value="2021" name="intact_month" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                        @foreach ($status as $item)
                                        <option value="{{ $item }}"
                                        @if ($Application->status==$item)
                                        selected
                                        @endif
                                        >{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Remark</label>
                                    <textarea name="remark" class="form-control">{{ $Application->remark }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <a href="{{route('Application.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<br>
<div class="col-md-12 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">Documnet</div>
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

                    @foreach ($documents as $item)
                        <div class="card component-card_6">
                            <div class="card-body ">
                                <div class="">
                                    <h4 class="card-text">{{ $item->name }} </h4>
                                    <h6 class="rating-count"><span class="badge outline-badge-primary"> {{ $item->status }} </span></h6>
                                    <h6 class="rating-count"><a href='{{ asset($item->file_name) }}' target="_blank" class='btn btn-info'>Show</a></h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
