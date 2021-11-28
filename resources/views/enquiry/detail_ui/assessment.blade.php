<div class="p-2">
    <h1>Assessment</h1>
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <th>Status</th>
                <th>University</th>
                <th>Course</th>
            </thead>
            <tbody>
                @forelse ($enquiry->Assessment as $item)
                <tr>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->University->name }}</td>
                    <td>{{ $item->Course->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">No Data Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
