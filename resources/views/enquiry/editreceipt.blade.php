@extends('layouts.theam')

@section('title')
Update Transaction
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">{{ __('Pending Amount Update') }}</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('Transaction.update',$transaction->id) }}">
                        @csrf
                        <input name="enquiry_id" value="{{ $transaction->enquiry_id }}"   hidden>
                        <div class="row">
                            <link rel="stylesheet" type="text/css"
                                href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{ Form::label('package_name', 'package name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('name', $transaction->package_name, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{ Form::label('price', 'price', ['class' => 'form-control-label']) }}
                                    {{ Form::text('price', $transaction->price, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('Payment Paid', 'Payment Paid', ['class' => 'form-control-label']) }}
                                    {{ Form::text('pending_price', $transaction->pending_price, ['class' => 'form-control']) }}

                                </div>
                            </div>
                            <div id="main" style="WIDTH:100%;">
  <div class="container">
<div class="accordion" id="faq">
                    <div class="card">
                        <div class="card-header" id="faqhead1">
                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                            aria-expanded="true" aria-controls="faq1">Bank Payment Mode</a>
                        </div>
                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                            <div class="card-body">
                            <div class="col-md-12">
                                            <!-- <label style="font-weight: 800;">Bank Payment Mode</label> -->
                                            <div class="form-group">
                                                <label for="bank_name" class="">Cheque Bank Name</label>
                                                <input type="text" name="bank_name"  value="{{ old('bank_name') }}"
                                                    class="@error('bank_name') is-invalid @enderror form-control" >
                                            </div>
                                            @error('bank_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="check_number" class="">Cheque  Number</label>
                                                <input type="number" name="check_number"  value="{{ old('check_number') }}"
                                                    class="@error('check_number') is-invalid @enderror form-control" >
                                            </div>
                                            @error('check_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="check_number" class="">Cheque  Date</label>
                                                <input type="date" name="check_date"  value="{{ old('check_date') }}"
                                                    class="@error('check_date') is-invalid @enderror form-control" >
                                            </div>
                                            @error('check_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="check_number" class="">Cheque  Amount</label>
                                                <input type="number" name="check_amount" id="check_amount" value="{{ old('check_amount') }}"
                                                    class="@error('check_amount') is-invalid @enderror form-control" >
                                            </div>
                                            @error('check_amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>       
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                            aria-expanded="true" aria-controls="faq2">UPI Payment Mode</a>
                        </div>

                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                            <div class="card-body">
                            <div class="col-md-12">
                                            <!-- <label style="font-weight: 800;">UPI Payment Mode</label> -->
                                            <div class="form-group">
                                                <label for="upi_type" class="">UPI Payment Type</label>
                                                <input type="text" name="upi_type" id="upi_type" value="{{ old('upi_type') }}"
                                                    class="@error('upi_type') is-invalid @enderror form-control" >
                                            </div>
                                            @error('upi_type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="upi_id" class="">UPI Id</label>
                                                <input type="text" name="upi_id" id="upi_id" value="{{ old('upi_id') }}"
                                                    class="@error('upi_id') is-invalid @enderror form-control" >
                                            </div>
                                            @error('upi_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="upi_amount" class="">UPI Amount</label>
                                                <input type="number" name="upi_amount" id="upi_amount" value="{{ old('upi_amount') }}"
                                                    class="@error('upi_amount') is-invalid @enderror form-control" >
                                            </div>
                                            @error('upi_amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>      
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                            aria-expanded="true" aria-controls="faq3">Cash Payment Mode</a>
                        </div>

                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                            <div class="card-body">
                            <div class="col-md-12">
                                            <!-- <label style="font-weight: 800;"></label> -->
                                            <div class="form-group">
                                                <label for="cash_mode" class="">Cash Payment Type</label>
                                                <select name="cash_mode" id="cash_mode" class="@error('cash_mode') is-invalid @enderror form-control" required>
                                                    <option value="Case Payment ">Yes</option>
                                                    <option value="No ">No </option>
                                                </select>
                                            </div>
                                            @error('cash_mode')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cash_amount" class="">Cash Amount</label>
                                                <input type="number" name="cash_amount" id="cash_amount" value="{{ old('cash_amount') }}"
                                                class="@error('cash_amount') is-invalid @enderror form-control" >
                                            </div>
                                            @error('cash_amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cash_date" class="">Cash Payment Date</label>
                                                <input type="date" name="cash_date" id="cash_date" value="{{ old('cash_date') }}"
                                                    class="@error('cash_date') is-invalid @enderror form-control" >
                                            </div>
                                            @error('cash_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>       
                        </div>
                        </div>
                    </div>
                </div>
    </div>
  </div>
  <style>
    #main {
  margin: 50px 0;
}

#main #faq .card {
  margin-bottom: 30px;
  border: 0;
}

#main #faq .card .card-header {
  border: 0;
  -webkit-box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
          box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
  border-radius: 2px;
  padding: 0;
}

#main #faq .card .card-header .btn-header-link {
  color: #fff;
  display: block;
  text-align: left;
  background: #e5e5e5;
  color: #222;
  padding: 20px;
}

#main #faq .card .card-header .btn-header-link:after {
  content: "\f107";
  font-family: 'Font Awesome 5 Free';
  font-weight: 900;
  float: right;
}

#main #faq .card .card-header .btn-header-link.collapsed {
  background: #2196f3;
  color: #fff;
}

#main #faq .card .card-header .btn-header-link.collapsed:after {
  content: "\f106";
}

#main #faq .card .collapsing {
  background: #e5e5e5;
  line-height: 30px;
}

#main #faq .card .collapse {
  border: 0;
}

#main #faq .card .collapse.show {
  background: #e5e5e5;
  line-height: 30px;
  color: #222;
}
  </style>
                        </div>
                        <div class="col-md-12 text-center">

                            <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                            <input type="button" class="btn btn-danger" value="{{ __('enquire.cancel_btn_btn') }}">
                        </div>
                </div>

                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection