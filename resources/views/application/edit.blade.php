@extends('layouts.theam');

@section('title')
Edit Application
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">{{ __('Edit Application') }}</div>
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
                                    <label for="intact_month_id">Intact Month</label>
                                    <input type="intact_month" readonly value="{{ $intact->month }}" name="intact_month" id="intact_month" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="intact_year_id">Intact Year</label>
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
