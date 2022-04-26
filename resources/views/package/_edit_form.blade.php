<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
    {{ Form::text('name', $Package->name, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('price', 'price', ['class' => 'form-control-label']) }}
    {{ Form::text('price', $Package->price, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
    {{ Form::label('phone_number', 'Phone number', ['class' => 'form-control-label']) }}
    {{ Form::date('start_date', $Package->start_date, ['class' => 'form-control']) }}

    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
    {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
    {{ Form::date('date', $Package->date, ['class' => 'form-control']) }}

    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('Status', ' Status', ['class' => 'form-control-label']) }}
{!! Form::select('status', ['Select' => 'Select', 'Active' => 'Active', 'Deactive' => 'Deactive'], false, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('note', ' Note', ['class' => 'form-control-label']) }}
        {{ Form::textarea('note', $Package->note, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-md-12">
</div>

</div>
