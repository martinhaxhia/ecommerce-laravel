@component('mail::message')

<<<<<<< HEAD
Welcome {{$user}}
=======
Welcome {{$user->name}}

>>>>>>> 6efe5a0a3d0b88c7768ed79f0f13ef3924cc3cad

@component('mail::button', ['url' => '/login'])
Login
@endcomponent

Thanks for your visit,<br>
{{ config('app.name') }}
@endcomponent
