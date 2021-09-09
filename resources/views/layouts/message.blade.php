@if(session()->has("success"))
    <div class="alert alert-success">
        <strong>{{session()->get("success")}}</strong>
    </div>
@endif
@if(session()->has("error"))
<br>
 <strong class="text-danger">{{session()->get("error")}}</strong>
@endif