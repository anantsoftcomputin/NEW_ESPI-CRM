@foreach ($enquiry->Documents as $item)
    <div class="card component-card_6">
        <div class="card-body ">
            <div class="">
                <h4 class="card-text">{{ $item->name }} </h4>
                <h6 class="rating-count"><span class="badge outline-badge-primary"> {{ $item->status }} </span></h6>
                <h6 class="rating-count"><a href='{{ asset($item->file_name) }}' target="_blank" class='btn btn-info'>Show</a></h6>
            </div>
        </div>
    </div>
@endforeach


