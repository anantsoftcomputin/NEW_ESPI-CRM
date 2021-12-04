@extends('layouts.theam')

@section('js')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
Asset
@endsection


@section('content')
<div class="col-md-12">
    <h1>Asset</h1>

    {{-- <a href='{{ route('assessments.create') }}' class='btn btn-info mb-2 float-right'>Add</a> --}}
    <button type="button" class="btn btn-primary mb-2 mr-2 float-right" data-toggle="modal" data-target="#exampleModal"> Add Document </button>
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th style="width: 100px;">#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($asset as $item)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href='{{ asset($item->file_name) }}' target="_blank" class='btn btn-info'>Show</a>
                    {{-- <a href='#' class='btn btn-danger' id='NAME'>Delete</a> --}}
                    <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class='btn btn-danger'>
                        Delete
                    </a>
                    <form id="frm-logout" action="{{ route('Asset.destroy',['Asset' => $item->id]) }}" method="POST" style="display: none;">
                        @method('delete')
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="4" class="text-center">No Data Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('Asset.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">

                            <div class="row">
                                <div class="col">
                                    <label for="file_title_document_desc">File Description</label>
                                    <textarea name="description" id="file_title_document_desc" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" id="file_title_document_con" style="">
                                    <label for="file_title_document">File Title</label>
                                    <input id="file_title_document" type="text" name="title" class="form-control" placeholder="Title of Documnet" style="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="file_input">File</label>
                                    <input id="file_input" name="file" type="file" class="form-control" placeholder="Upload File" accept=".pdf,.doc" required>
                                </div>
                            </div>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-outline-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

