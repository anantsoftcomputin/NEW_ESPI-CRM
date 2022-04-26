<div class="p-2">
    <h1>Application</h1>
    {{-- <a href="{{ route('Assessment.Add',$enquiry->id) }}" class="btn btn-info float-right mb-3">Add Application</a> --}}
    <div id="withoutSpacing" class="no-outer-spacing">
        @forelse ($enquiry->Application as $item)
        <div class="card no-outer-spacing">
            <div class="card-header" id="headingTwo2">
                <section class="mb-0 mt-0">
                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#withoutSpacingAccordionTwo{{ $item->id }}" aria-expanded="false" aria-controls="withoutSpacingAccordionTwo{{ $item->id }}">
                        <h2>
                            {{$item->application_id}} | {{ $item->University->name }} | {{ $item->Course->name }} | {{ $item->University->Country->name }} <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        </h2>
                    </div>
                </section>
            </div>
            <div id="withoutSpacingAccordionTwo{{ $item->id }}" class="collapse" aria-labelledby="headingTwo2" data-parent="#withoutSpacing">
                <div class="card-body">
                    <div class="pl-5 mx-auto">
                        <div class="timeline-line">
                            @foreach ($item->Remarks as $remarks)

                            <div class="item-timeline">
                                <p class="t-time">{{ date('h:i',strtotime($remarks->created_at)) ?? "Not Set Yet" }}</p>
                                <div class="t-dot t-dot-primary">
                                </div>
                                <div class="t-text">
                                    <p> {{ $remarks->status->status }} | {{ $remarks->remark ?? "Remark not set"}} | Start Date : {{ $remarks->start_date ?? "Not started yet"}} | Completed Date : {{ $remarks->completed_date ?? "Not Complited yet"}}</p>
                                    <p class="t-meta-time">{{ $remarks->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="table-responsive" style="display: none;">
        <table class="table table-bordered mb-4">
            <thead>
                <th>Application Id</th>
                <th>University</th>
                <th>Course</th>
                <th>Country</th>
            </thead>
            <tbody>

                @forelse ($enquiry->Application as $item)

                <tr>
                    <td>{{ $item->application_id }}</td>
                    <td>{{ $item->University->name }}</td>
                    <td>{{ $item->Course->name }}</td>
                    <td>{{ $item->University->Country->name }}</td>
                    <td>{{ json_encode($item->Remarks) }}</td>
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
