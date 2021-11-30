<div class="p-2">
    <h1>Application</h1>
    <div class="table-responsive">
        <table class="table table-bordered mb-4">
            <thead>
                <th>Application Id</th>
                <th>University</th>
                <th>Course</th>
            </thead>
            <tbody>

                @forelse ($enquiry->Application as $item)

                <tr>
                    <td>{{ $item->application_id }}</td>
                    <td>{{ $item->University->name }}</td>
                    <td>{{ $item->Course->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No Data Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
