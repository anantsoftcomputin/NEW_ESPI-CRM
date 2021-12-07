@component('mail::message')
# Added new Assessment.

<h1>If you want to see click here </h1>

@component('mail::button', ['url' => "#"])
Show All Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
