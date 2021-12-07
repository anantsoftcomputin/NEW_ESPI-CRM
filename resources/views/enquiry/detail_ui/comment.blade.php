

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/apps/mailbox-chat.js"></script>
    <style>
        .file_button
        {

            height: 29px;
            background: #2196f3;
            width: 32px;
            border-radius: 6px;
            position: absolute;
            top: 42px;
            align-items: end;
            float: right;
            margin: 8px;
            right: 18px;
            padding: 3px;
            color: white!important;
            box-shadow: 0 2px 5px 0 #e0e6ed, 0 2px 10px 0 #e0e6ed;
        }
        .sander_name
        {
            bottom: 20px;
            position: absolute;
            float: right;
            right: 20px;
            background: #cccccc36;
            color: #000;
            font-size: unset;
            padding: 2px;
            border-radius: 5px;
            margin: -16px;
            font-family: monospace;
        }
    </style>
    <!-- END PAGE LEVEL SCRIPTS -->
<div class="p-2">
    <h1>Comments </h1>
    <hr>
    @foreach ($enquiry->Comments as $comments)
    <div class="row">
        <div class="col-sm-9 @if ($comments->Sender->id == \Auth::user()->id) offset-sm-3 @endif ">
            <div class="alert alert-primary" role="alert">
                <h3>{{ $comments->string }}</h3>
                @empty(!$comments->attachment)
                    <a href='{{ asset($comments->attachment) }}' class='btn btn-rounded btn-info' target="_blenk"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg></label></a>
                @endempty
                <p class="sander_name"> Sent by {{ $comments->Sender->name }} </p>
            </div>
            @foreach ($comments->child as $child)
            <div class="col-sm-10 @if ($comments->Sender->id == \Auth::user()->id) offset-sm-2 @endif ">
                <div class="alert alert-info" role="alert">
                    <h3>{{ $child->string }}</h3>
                    @empty(!$child->attachment)
                        <a href='{{ asset($child->attachment) }}' class='ml-1 btn btn-rounded btn-info' target="_blenk"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg></label></a>
                    @endempty
                    <p class="sander_name"> Sent by {{ $child->Sender->name }} </p>
                </div>
            </div>
            @endforeach

            <form action="{{ route('Comment.store',$enquiry->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-10 col-sm-offset-10  @if ($comments->Sender->id == \Auth::user()->id) offset-sm-2 @endif" >
                    <div class="form-group" style="display: flex;">
                        <input type="hidden" name="parent_id" value="{{ $comments->id }}">
                        <input name="string" placeholder="Reply" class="form-control" type="text">
                        <label for="file_{{ $comments->id }}" class="btn btn-success ml-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg></label>
                            <input type="file" name="file" id="file_{{ $comments->id }}" style="opacity: 0; position: absolute; z-index: -1;">
                        <button class="btn btn-info ml-2">Submit</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    @endforeach

    <div class="col-sm-12 col-sm-offset-12 frame">
        <div>
            <form action="{{ route('Comment.store',$enquiry->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 col-sm-offset-12">
                    <div class="form-group">
                        <label for="comment">Comment : </label>
                        <textarea name="string" id="comment" class="form-control"></textarea>
                        <label for="file" class="file_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg></label>
                        <input type="file" name="file" id="file" style="opacity: 0; position: absolute; z-index: -1;">
                    </div>
                </div>
                <button class="btn btn-info">Submit</button>
            </form>

        </div>
    </div>
</div>
