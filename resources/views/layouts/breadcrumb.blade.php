<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        @foreach(Request::segments() as $segment)
            @if ($loop->last)
                <li class="breadcrumb-item" aria-current="page">
                    <a href="#">{{ucfirst($segment)}}</a>
                </li>
            @else
                <li class="breadcrumb-item" aria-current="page">
                    <a href="#">{{ucfirst($segment)}}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
