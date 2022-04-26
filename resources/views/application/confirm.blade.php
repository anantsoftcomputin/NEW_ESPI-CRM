@extends('layouts.theam')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/elements/infobox.css') }}">
<style></style>
@endsection

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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="widget-content widget-content-area bx-top-6">
        <form action="{{ route('Assessment.ApplySubmit',[$Ass->id]) }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            {!! bootstrap_input_6('name','Student Name',$Ass->Enquiry->name) !!}

            {!! bootstrap_input_6('email','Student Email',$Ass->Enquiry->email) !!}

            @php
                $name_coundilar="";
            @endphp
            @foreach ($Ass->Enquiry->Counsellor as $item)
                @php
                    if ($loop->last)
                    {
                        $name_coundilar.=$item->Detail->name;
                    }
                    else {
                        $name_coundilar.=$item->Detail->name.",";
                    }
                @endphp
            @endforeach
            {!! bootstrap_input_6('Counsellor','Counsellor',$name_coundilar ?? "") !!}


            {!! bootstrap_input_6('Country','Country',$Ass->University->Country->name) !!}

            {!! bootstrap_input_6('phone','Student Phone',$Ass->Enquiry->phone) !!}

            {!! bootstrap_input_6('First_language','Student First Language',$Ass->Enquiry->first_language) !!}

            {!! bootstrap_input_6('DOB','Student DOB',$Ass->Enquiry->dob) !!}

            {!! bootstrap_input_6('gender','Gender',$Ass->Enquiry->gender) !!}

            {!! bootstrap_input_6('Postal Code','Postal Code',$Ass->Enquiry->postal_code) !!}


            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Select Processor User</label>
                    <select name="processor_id" class="form-control" required>
                        @forelse ($processor as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                            <option value="">No User Found</option>
                        @endforelse
                    </select>
                </div>
            </div>

            @if ($Ass->Enquiry->reference_source=="Agent")
                <div class="col-md-6"></div>
                {!! bootstrap_input_6('Agent Name','Agent Name',$Ass->Enquiry->reference_name) !!}
                {!! bootstrap_input_6('Agent Phone','Agent Phone',$Ass->Enquiry->reference_phone) !!}
                {!! bootstrap_input_6('Agent Code','Agent Code',$Ass->Enquiry->reference_code) !!}
            @endif

            <div class="col-md-12">

                <br>

                <div class="infobox-1" style="width:100%">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                    </div>
                    <h5 class="info-heading">{{ $Ass->University->name }}</h5>
                    <p class="info-text">{{ $Ass->Course->name }}</p>
                </div>

                <br>

                <hr>
                @empty(!count($requirement))
                    <h3>Application Requirement</h3>
                    @foreach ($requirement as $item)
                        <div class="form-group">
                            <label for="">{{ $item->documents }}</label>
                            <input type="file" name="{{ $item->documents }}" class="form-control" accept=".{{ $item->type }}" required>
                        </div>
                    @endforeach
                @endempty

            </div>
            <div class="col-md-12">

                    @csrf
                    <button class="btn btn-info" type="submit">Confirm</button>
                </form>

            </div>



        </div>
    </div>
</div>
@endsection
