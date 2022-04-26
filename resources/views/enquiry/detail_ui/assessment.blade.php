<div class="p-2">
    <h1>Assessment</h1>
    <a href="{{ route('Assessment.Add',$enquiry->id) }}" class="btn btn-info float-right mb-3">Add Assesment</a>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <th>Status</th>
                <th>University</th>
                <th>Course</th>
                <th>Contry</th>
                <th>Date</th>
            </thead>
            <tbody>
                @forelse ($enquiry->Assessment as $item)
                <tr>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->University->name }}</td>
                    <td>{{ $item->Course->name }}</td>
                    <td>{{ $item->University->Country->name }}</td>
                    <td>{{ $item->created_at->diffForhumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No Data Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
