@component('mail::message')
# Enquires

{{ $details['title'] }}

## Detail
|Inquiry  |Detail                              |
|----------------|-----------------------------------|
|Name :  |{{  $details['enquiry_detail']->name }}           |
|Email :         | {{ $details['enquiry_detail']->email }} |
|Phone :         | {{ $details['enquiry_detail']->phone }} |
|Country :         | {{ $details['enquiry_detail']->Country->name }} |


@component('mail::button', ['url' => $details['url']])
Show All Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
