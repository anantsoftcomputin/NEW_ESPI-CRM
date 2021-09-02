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
<div class="col-md-12">
    <div class="custom-control custom-checkbox">
    {!! Form::hidden('status', 0) !!}
    <input type="checkbox" name="status" value="1" {{ $user->status ? 'checked' : ''}} class="custom-control-input" id="status">
    {{ Form::label('status', 'Status', ['class' => 'custom-control-label']) }}
    </div>
</div>