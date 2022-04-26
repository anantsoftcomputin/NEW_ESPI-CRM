<div class="col-md-12 text-center mt-2 mb-3">
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Card Details</th>
                    <th>Number</th>
                    <th>Amount </th>
                    <th>Date</th>
                    <th>note</th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($enquiry->transaction as $transaction)
                    @if ($transaction->user->name==\Auth::user()->name OR \Auth::user()->roles->first()->name=="super-admin")
                        <tr>
                            <td>
                                <span class="badge badge-primary"> {{ $transaction->title }} </span>
                            </td>
                            <td>{{ $transaction->price }}</td>
                            <td>{{ $transaction->payment_mode }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                            <td>{{ $transaction->note }}</td>
                        </tr>
                    @endif
                @empty

                @endforelse --}}
            </tbody>
        </table>
    </div>

</div>
