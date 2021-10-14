@extends('layouts.theam')

@section('js')
<link rel="stylesheet" href="{{ asset('assets/css/elements/search.css') }}">
@endsection

@section('content')
        <div class="col-md-3">
            <x-filter />
        </div>
        <div class="col-md-9">
            <x-view-university />
        </div>
@endsection
