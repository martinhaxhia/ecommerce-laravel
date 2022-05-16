@component('mail::message')

Welcome {{$user}}

@component('mail::button', ['url' => '/login'])
Login
@endcomponent

Thanks for your visit,<br>
{{ config('app.name') }}
@endcomponent
