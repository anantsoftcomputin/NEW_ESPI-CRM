<?php
$page="";
$title="";
?>
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        @if($page))
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">{{$page ?? ""}}</a></li>
        @endif
        @if($title))
        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{$title ?? ""}}</a></li>
        @endif
    </ol>
</nav>