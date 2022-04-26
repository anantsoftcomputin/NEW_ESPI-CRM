@extends('layouts.theam')

@section('title')
    Reports
@endsection

@section('css')
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"
        class="dashboard-analytics" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection

@section('js')
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>
@endsection



@section('content')
<style>
    td, th {
    padding: 21px;
}
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session()->has('message'))
                    <p class="btn btn-success btn-block btn-sm custom_message text-left" style="margin-top: 10px;">
                        {{ session()->get('message') }}</p>
                @endif

                <legend>General</legend>

                <form action="" method="get">
                    <div class="col-md-3">
                        <label for="">User</label>
                        <select class="form-control" name="user" id="user">
                            <option value="">{{ __('Select') }}</option>
                            @foreach ($data as $us)
                                <option value="{{ $us->id }}">{{ $us->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div>

                    <div class="col-md-2" style="margin-top: 24px;">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
     <div class="table-div">
				<table class="table-print-style-1">
				  <thead>
					<tr>
					  <th>{{__('id') }}</th>
					  <th>{{__('title') }}</th>
					  <th>{{__('price') }}</th>
					  <th>{{__('payment mode') }}</th>
					  <th>{{__('date') }}</th>
					</tr>
				  </thead>
				  <tbody>
				  @foreach($data_Transaction as $data1)
				  {{-- <?php echo " $Transaction  <br>";?> --}}

				  <tr>

                      <td> {{ $data1->id }} </td>
                      <td> {{ $data1->title }} </td>
                      <td> {{ $data1->price }} </td>
                      <td> {{ $data1->payment_mode }} </td>
					<td> {{date('m/d/Y', strtotime($data1->created_at))}} </td>
				  </tr>
				  @endforeach
				  <tr>
				  </tr>
				  </tbody>

@endsection
