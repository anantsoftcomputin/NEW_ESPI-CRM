

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/apps/mailbox-chat.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
<div class="p-2">
    <h1>Comments </h1>
    <hr>
    @foreach ($enquiry->Comments as $comments)
    <div class="row">
        <div class="col-sm-9 @if ($comments->Sender->id == \Auth::user()->id) offset-sm-3 @endif ">
            <div class="alert alert-primary" role="alert">
                <h3>{{ $comments->string }}</h3>
                <br>
                <p>- {{ $comments->Sender->name }}</p>
            </div>
            @foreach ($comments->child as $child)
            <div class="col-sm-10 @if ($comments->Sender->id == \Auth::user()->id) offset-sm-2 @endif ">
                <div class="alert alert-info" role="alert">
                    <h3>{{ $child->string }}</h3>
                    <br>
                    <p>- {{ $child->Sender->name }}</p>
                </div>
            </div>
            @endforeach

            <form action="{{ route('Comment.store',$enquiry->id) }}" method="POST">
                @csrf
                <div class="col-sm-10 col-sm-offset-10  @if ($comments->Sender->id == \Auth::user()->id) offset-sm-2 @endif" >
                    <div class="form-group" style="display: flex;">
                        <input type="hidden" name="parent_id" value="{{ $comments->id }}">
                        <input name="string" placeholder="Reply" class="form-control" type="text">
                        <button class="btn btn-info ml-2">Submit</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    @endforeach

    <div class="col-sm-12 col-sm-offset-12 frame">
        <div>
            <form action="{{ route('Comment.store',$enquiry->id) }}" method="POST">
                @csrf
                <div class="col-sm-12 col-sm-offset-12">
                    <div class="form-group">
                        <label for="comment">Comment : </label>
                        <textarea name="string" id="comment" cols="" rows="" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-info">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
