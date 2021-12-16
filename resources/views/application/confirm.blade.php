@extends('layouts.theam')

@section('title')
Conform Application
@endsection

@section('content')
<div class="col-md-12 mb-3">
    <div class="widget-content widget-content-area bx-top-6 mb-6 pb-6">
        <div class="row">
            <h1 class="ml-3">{{ $Ass->Enquiry->name }} Profile </h1>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="widget-content widget-content-area bx-top-6">
        <div class="row">
            {!! bootstrap_input_6('name','Student Name',$Ass->Enquiry->name) !!}

            {!! bootstrap_input_6('email','Student Email',$Ass->Enquiry->email) !!}

            {!! bootstrap_input_6('phone','Student Phone',$Ass->Enquiry->phone) !!}

            {!! bootstrap_input_6('First_language','Student First Language',$Ass->Enquiry->first_language) !!}

            {!! bootstrap_input_6('DOB','Student DOB',$Ass->Enquiry->dob) !!}

            {!! bootstrap_input_6('gender','Gender',$Ass->Enquiry->gender) !!}

            {!! bootstrap_input_6('Postal Code','Postal Code',$Ass->Enquiry->postal_code) !!}

            <div class="col-md-12">
                <form action="{{ route('Assessment.ApplySubmit',[$Ass->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-info" type="submit">Confirm</button>
                </form>

            </div>



        </div>
    </div>
</div>
@endsection
