<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
    {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('email', 'E-mail', ['class' => 'form-control-label']) }}
    {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
    {{ Form::label('phone_number', 'Phone number', ['class' => 'form-control-label']) }}
    {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('role', 'Select Role', ['class' => 'form-control-label']) }}
    {{ Form::select('role', $roles, $user->roles, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select role...']) }}
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
<div class="col-md-6">
    {!! Form::radio('status', '1', '1', []) !!} Active
    {!! Form::radio('status', '0', '0', []) !!} In Active
</div>
<div class="col-md-12">
        <label class="new-control new-checkbox checkbox-primary">
        <input name="notification" type="checkbox" id="notification"  {{ $user->fcm_token ? 'checked' : ''}} class="new-control-input" onchange="initFirebaseMessagingRegistration()" >
        <span class="new-control-indicator"></span>Allow Notification
        </label>
    </div>
    <input type="hidden" id="fcm_token" name="fcm_token" value="{{$user->fcm_token}}">
</div>
