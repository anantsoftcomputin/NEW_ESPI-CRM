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
                    <th>note</th>
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
                            <td>{{ $transaction->note }}</td>
                        </tr>
                    {{-- @endif --}}
                @empty

                @endforelse
            </tbody>
        </table>
    </div>

</div>
