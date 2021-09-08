@component('mail::message')
# Your OTP

{{ $details['otp'] }}


<!-- @component('mail::button', ['url' => $details['url']])
Show All Detail
@endcomponent -->

Thanks,<br>
{{ config('app.name') }}
@endcomponent