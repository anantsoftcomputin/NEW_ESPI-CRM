<div class="p-2">
    @forelse ($enquiry->Activity as $item)
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
    @endforelse

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

