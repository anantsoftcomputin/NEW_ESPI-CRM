@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('enquire.well_done') }}</h4>
            <p>{{ __('enquire.success_msg',['code' => $enq->id]) }}</p>
            <hr>
        </div>
    <a href="{{ url('/') }}" class="btn btn-info">{{ __('enquire.go_back') }}</a>
    </div>

</div>
@endsection
