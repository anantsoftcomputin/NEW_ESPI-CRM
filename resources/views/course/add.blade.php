@extends('layouts.theam')

@section('title')
Add Course
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">{{ __('Add University') }}</div>
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
                    <form method="POST" action="{{ route('Course.store') }}">
                        @csrf
                        <div class="row">
                            @include('course._form')
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
