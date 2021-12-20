<div class="col-md-12">
    <div class="alert alert-secondary">
        <strong>{{__('enquire.otp_message',['branch' => $branch])}}</strong>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="email">OTP</label>
        <input type="hidden" name="id" value="{{$enquiry->id}}">
        <input type="text" placeholder="Enter OTP" name="otp" id="otp" value="{{old('otp')}}" class="form-control" required>
        @include('layouts.message')
    </div>
</div>

<div class="col-md-12">
<a id="resend_otp" href="{{route('enquiry.resendotp',['id'=>$enquiry->id])}}" class="text-primary">Resend OTP</a>
</div>


