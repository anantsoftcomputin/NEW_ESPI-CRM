<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>


<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('phone_number', ' Number  Card', ['class' => 'form-control-label']) }}
        {{ Form::text('card_number', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('Expiration Date', ' Expiration Date', ['class' => 'form-control-label']) }}
        {{ Form::date('date', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('note', ' Note', ['class' => 'form-control-label']) }}
        {{ Form::text('note', null, ['class' => 'form-control']) }}
    </div>
</div>

{{--
<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
        {{ Form::text('password', ['class' => 'form-control']) }}
    </div>
</div> --}}

{{-- <div class="col-md-6">
    <div class="form-group">
        {{ Form::label('note', 'Note', ['class' => 'form-control-label']) }}
        {{ Form::text('note', ['class' => 'form-control']) }}
    </div>
</div> --}}

<div class="col-md-12">


    <input type="hidden" id="fcm_token" name="fcm_token">
</div>
