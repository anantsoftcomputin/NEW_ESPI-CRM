@component('mail::message')
# New Assesment Added
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

</style>
<table border="1">
    <tr>
        <td>Country</td>
        <td>University</td>
        <td>Course</td>
    </tr>
    @foreach ($assessments as $item)
        <tr>
            <td>
                {{ $item->University->Country->name }}
            </td>
            <td>
                {{ $item->University->name }}
            </td>
            <td>
                {{ $item->Course->name }}
            </td>
        </tr>
    @endforeach
</table>



@component('mail::button', ['url' => "#"])
Show All Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
