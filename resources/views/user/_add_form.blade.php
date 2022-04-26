<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('email', 'E-mail', ['class' => 'form-control-label']) }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('phone_number', 'Phone number', ['class' => 'form-control-label']) }}
        {{ Form::text('phone', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('role', 'Select Role', ['class' => 'form-control-label']) }}
        {{ Form::select('role', $roles, null, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select role...']) }}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm password', ['class' => 'form-control-label']) }}
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-md-12">
    {!! Form::radio('status', '1', '1', []) !!} Active
    {!! Form::radio('status', '0', '0', []) !!} In Active
</div>
<div class="col-md-12">
    {!! Form::radio('is_counsellor', '1', '1', []) !!} Is Counsellor
</div>
<div class="col-md-12">

    <div class="n-chk">

        <label class="new-control new-checkbox checkbox-primary">
        <input type="checkbox" class="new-control-input" onchange="initFirebaseMessagingRegistration()" name="notification">
        <span class="new-control-indicator"></span>Allow Notification
        </label>
    </div>
    <input type="hidden" id="fcm_token" name="fcm_token">
</div>
