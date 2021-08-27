@component('mail::message')
# Enquires

{{ $details['title'] }}


@component('mail::button', ['url' => $details['url']])
Show All Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
