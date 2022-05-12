@component('mail::message')
# Introduction

Welcome {{ $user }}

@component('mail::button', ['url' => '/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
