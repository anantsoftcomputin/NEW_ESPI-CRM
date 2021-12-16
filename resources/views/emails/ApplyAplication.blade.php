@component('mail::message')
# Thank You for Applay Application.

<h1>If you want to see In Detail.</h1>

@component('mail::button', ['url' => "#"])
Show All Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
