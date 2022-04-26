<div class="p-2">
    <div class="text-right">
        <a href='{{ route('Enquires.edit',['Enquire'=>$enquiry]) }}' class='btn btn-info' id='NAME'>Edit Enquiry</a>
    </div>
    <h1>Detail</h1>
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <tbody>
                <tr>
                    <th>Email</th>
                    <td>{{ $enquiry->email }} </td>
                </tr>
                <tr>
                    <th>First Language</th>
                    <td>{{ $enquiry->first_language }}</td>
                </tr>
                <tr>
                    <th>Counsellor</th>
                    <td>
                    @foreach ($enquiry->Counsellor as $item)
                        <span class="badge badge-primary">{{$item->Detail->name}}</span>
                    @endforeach
                    </td>
                </tr>
                <tr>
                    <th>DOB</th>
                    <td>{{ $enquiry->dob }} </td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><span class="badge badge-primary" style="text-transform: capitalize;">{{ $enquiry->gender }}</span> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
