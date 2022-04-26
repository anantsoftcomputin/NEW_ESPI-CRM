<div class="p-2">
    <div class="pl-5 mx-auto">
    <div class="timeline-line">
        @foreach ($enquiry->Activity as $remarks)

        <div class="item-timeline">
            <p class="t-time">{{ date('h:i',strtotime($remarks->created_at)) ?? "Not Set Yet" }}</p>
            <div class="t-dot t-dot-primary">
            </div>
            <div class="t-text">
                <p> {{ $remarks->string }} | {{ $remarks->User->name ?? "System"}}</p>
                <p class="t-meta-time">{{ $remarks->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @endforeach


        </div>
    </div>
</div>
<div class="p-2">
    {{-- @forelse ($enquiry->Activity as $item)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $item->string }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @empty
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Empty
        </div>
    @endforelse --}}

    {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Enquires!</strong> Add New Enquire by jasmin shukla. - 50min Ago
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Assessment!</strong> Add New Assessment by Kajal Parte. - 45min Ago
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Application !</strong> Add New Application University of Toronto. - 30min Ago
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Application !</strong> Rejected University of Toronto. - 31min Ago
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Assessment !</strong> Add new assessment Embry-Riddle Aeronautical  University - 30min Ago
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div> --}}


</div>

