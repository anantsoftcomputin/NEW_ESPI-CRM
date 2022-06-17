<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
    {{ Form::text('name', $transaction->name, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('price', 'price', ['class' => 'form-control-label']) }}
    {{ Form::text('price', $TransactionCredit->price, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
    {{ Form::label('phone_number', 'Phone number', ['class' => 'form-control-label']) }}
    {{ Form::date('start_date', $transaction->start_date, ['class' => 'form-control']) }}

    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
    {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
    {{ Form::date('date', $transaction->date, ['class' => 'form-control']) }}

    </div>
</div>

</div>
