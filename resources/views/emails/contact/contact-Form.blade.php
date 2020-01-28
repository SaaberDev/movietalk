@component('mail::message')
# MESSAGE
@component('mail::panel')
{{ $data['message'] }}
@endcomponent

** Name: ** {{ $data['name'] }} <br>
** Email: ** {{ $data['email'] }} <br>
** Phone Number: ** {{ $data['phone'] }}

{{--@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}--}}
@endcomponent
