<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>


<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('price', ' Price', ['class' => 'form-control-label']) }}
        {{ Form::text('price', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('Start Date', ' Start Date', ['class' => 'form-control-label']) }}
        {{ Form::date('start_date', null, ['class' => 'form-control']) }}
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
        {{ Form::label('Status', ' Status', ['class' => 'form-control-label']) }}
{!! Form::select('status', ['Select' => 'Select', 'Active' => 'Active', 'Deactive' => 'Deactive'], false, ['class' => 'form-control']) !!}
    </div>
</div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('note', ' Note', ['class' => 'form-control-label']) }}
        {{ Form::textarea('note', null, ['class' => 'form-control']) }}
    </div>
</div>


<div class="col-md-12">


    <input type="hidden" id="fcm_token" name="fcm_token">
</div>
