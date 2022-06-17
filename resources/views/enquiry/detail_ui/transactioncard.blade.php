<div class="col-md-12 text-center mt-2 mb-3">
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>payment Status</th>
                    <th>receiver </th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($enquiry->TransactionCredit as $transaction)
                    {{-- @if ($transaction->user->name==\Auth::user()->name OR \Auth::user()->roles->first()->name=="super-admin") --}}
                        <tr>

                            <td>{{ $transaction->name }}</td>
                            <td>{{ $transaction->price }}</td>
                            <td><span class="badge badge-primary">{{ $transaction->payment_status }}</span></td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                                                            
                        </tr>
                    {{-- @endif --}}
                @empty

                @endforelse
            </tbody>
        </table>
    </div>


    <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#TransactionCard">
        Add  Transaction Credit  Card
      </button>
</div>

<div class="modal fade" id="TransactionCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form method="POST" action="{{ route('TransactionCredit.Add',$enquiry->id) }}" enctype="multipart/form-data" id="card_transactions_form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Credit Card Transactions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price" class="mandatory"> Name</label>
                                            {{-- <input type="text" name="name" id="name" value="{{ old('name') }}"
                                                class="@error('name') is-invalid @enderror form-control" required> --}}
                                                <select name="name" id="name" class="@error('card_number') is-invalid @enderror form-control" required>
                                                    @foreach ( $Transaction as  $item)
                                                    <option value="select">select</option>
                                                        <option value="{{ $item -> name }}">{{ $item -> name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="price" class="mandatory">Card Number</label>
                                                {{-- <input type="number" name="card_number" id="card_number" value="{{ old('card_number') }}"
                                                    class="@error('card_number') is-invalid @enderror form-control" required> --}}
                                                    <select name="card_number" id="card_number" class="@error('card_number') is-invalid @enderror form-control" required>
                                                        @foreach ( $Transaction as  $item)
                                                        <option value="select">select</option>
                                                            <option value="{{ $item -> card_number }}">{{ $item -> card_number }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('card_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="price" class="mandatory">Price</label>
                                                <input type="number" name="price" id="price" value="{{ old('price') }}"
                                                    class="@error('price') is-invalid @enderror form-control" required>
                                            </div>
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="payment_title" class="mandatory">Perpose Of Payment</label>
                                                    <select name="payment_title" id="payment_title" class="@error('payment_title') is-invalid @enderror form-control" required>
                                                        @foreach (config('espi.payment_title') as $key=>$item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            @error('payment_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="payment_status" class="mandatory">Payment Status</label>
                                                    <select name="payment_status" id="payment_status" class="@error('payment_status') is-invalid @enderror form-control" required>
                                                            <option value="">Select</option>
                                                            <option value="complete">Complete</option>
                                                            <option value="pending">Pending</option>
                                                    </select>
                                            </div>
                                            @error('payment_status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="note" class="mandatory">Note</label>
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