<div class="col-md-12 text-center mt-2 mb-3">
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>title</th>
                    <th>Price</th>
                    <!-- <th>payment mode</th> -->
                    <th>receiver </th>
                    <th>Date</th>
                    <th>note</th>
                    <th>Receipt</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($enquiry->transaction as $transaction)
                    {{-- @if ($transaction->user->name == \Auth::user()->name or \Auth::user()->roles->first()->name == 'super-admin') --}}
                   {{-- <?php  print_r($transaction->all()); ?> --}}
                    <tr>
                        <td>
                            <span class="badge badge-primary"> {{ $transaction->title }} </span>
                        </td>
                        <td>{{ $transaction->price }}</td>
                        <!-- <td>{{ $transaction->payment_mode }}</td> -->
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                        <td>{{ $transaction->note }}</td>
                        {{-- <a href="'.route('Enquires.edit',$row->id).'" style="background: #9b59b6; color: #fff;" class="assessment" title="Edit Enquiry"> --}}

                        <td><a target="_blank" href="{{ route('Transaction.receipt', $transaction->id) }}"
                                {{-- style="background: #9b59b6; color: #fff;" --}}
                                class="assessment btn rounded-circle mb-2 mr-1 bs-tooltip" title="RECEIPT"><svg
                                    xmlns="http://www.w3.org/2000/svg" aria-label="PDF" role="img"
                                    viewBox="0 0 512 512">
                                    <rect width="512" height="512" rx="15%" fill="#c80a0a" />
                                    <path fill="#fff"
                                        d="M413 302c-9-10-29-15-56-15-16 0-33 2-53 5a252 252 0 0 1-52-69c10-30 17-59 17-81 0-17-6-44-30-44-7 0-13 4-17 10-10 18-6 58 13 100a898 898 0 0 1-50 117c-53 22-88 46-91 65-2 9 4 24 25 24 31 0 65-45 91-91a626 626 0 0 1 92-24c38 33 71 38 87 38 32 0 35-23 24-35zM227 111c8-12 26-8 26 16 0 16-5 42-15 72-18-42-18-75-11-88zM100 391c3-16 33-38 80-57-26 44-52 72-68 72-10 0-13-9-12-15zm197-98a574 574 0 0 0-83 22 453 453 0 0 0 36-84 327 327 0 0 0 47 62zm13 4c32-5 59-4 71-2 29 6 19 41-13 33-23-5-42-18-58-31z" />
                                </svg></a>
                        </td>
                    </tr>
                    {{-- @endif --}}
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#Transaction">
        Add Transaction
      </button>
</div>


<div class="modal fade" id="Transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form method="POST" action="{{ route('Transaction.Add',$enquiry->id) }}" enctype="multipart/form-data" id="add_transactions_form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Transactions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                                @csrf
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="package_name" class="mandatory">Package  Name</label>
                                                    <select  id="package_name"  name="package_name"  class="@error('package_name') is-invalid @enderror form-control" required>
                                                    <option value="select">select</option>
                                                        @foreach ($Package as $key=>$item)
                                                            <option value="{{ $item ->name}}">{{ $item->name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('package_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="package_price" class="mandatory">Package  price</label>
                                                    <select  id="value1"  name="package_price" class="@error('package_price') is-invalid @enderror form-control" required>
                                                    <option value="select">select</option>
                                                        @foreach ($Package as $key=>$item)
                                                            <option value="{{ $item ->price}}">{{ $item->price}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('payment_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price" class="">Payment Paid</label>
                                                <input type="number" name="price" id="value2" value="{{ old('price') }}"
                                                    class="@error('price') is-invalid @enderror form-control" >
                                            </div>
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pending_price" class="">Payment Pending Amount</label>
                                                <input type="number" name="pending_price" id="sum" value="{{ old('pending_price') }}"
                                                    class="@error('pending_price') is-invalid @enderror form-control" >
                                            </div>
                                            @error('pending_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="payment_title" class="">Purpose Of Payment</label>
                                                    <select name="title" id="payment_title" class="@error('payment_title') is-invalid @enderror form-control" required>
                                                        @foreach (config('espi.payment_title') as $key=>$item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('payment_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="payment_mode" class="" id="payment_mode">Payment Mode</label>
                                                    <select name="payment_mode" id="payment" class="@error('payment_mode') is-invalid @enderror form-control" required>
                                                        <option value="Case Payment ">Cash Payment </option>
                                                        <option value="Online Payment ">Online Payment </option>
                                                        <option value="Check Payment ">Cheque Payment </option>
                                                    </select>
                                            </div>
                                            @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
<!-- new -->
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
<!-- end -->
                                        
                                        
                                         
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="note" class="">Note</label>
                                                <textarea name="note" id="note" class="form-control"></textarea>
                                            </div>
                                            @error('note')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" style="background-color:var(--danger); color:#fff;" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
</div>
