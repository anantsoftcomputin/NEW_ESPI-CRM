@extends('layouts.app')



@section('content')
<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">Welcome</div>
                <div class="card-body">
                    Welcome to ESPI.
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
