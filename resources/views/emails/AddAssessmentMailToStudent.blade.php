@component('mail::message')
# New Assesment Added
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

</style>

@component('mail::table')
| Country       | University         | Course  | Deail |
| ------------- |:-------------:| :--------:| --------:|
@foreach ($assessments as $item)
| {{ $item->University->Country->name }} | {{ $item->University->name }} |{{ $item->Course->name }}| [ Show ]({{ $item->Course->course_link."?target=_blank" ?? "#" }})|
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
