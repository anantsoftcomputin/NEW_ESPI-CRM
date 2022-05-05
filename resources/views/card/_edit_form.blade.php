<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
    {{ Form::text('name', $Card->name, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
    {{ Form::label('card_number', 'Card number', ['class' => 'form-control-label']) }}
    {{ Form::text('card_number', $Card->card_number, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
    {{ Form::label('date', ' Expiration  Date', ['class' => 'form-control-label']) }}
    {{ Form::date('date', $Card->date, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('note', ' Note', ['class' => 'form-control-label']) }}
        {{ Form::text('note', $Card->note, ['class' => 'form-control']) }}
    </div>
</div>
    <input type="hidden" id="fcm_token" name="fcm_token" value="{{$Card->fcm_token}}">
</div>
