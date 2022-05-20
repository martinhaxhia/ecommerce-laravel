<?php

namespace App\Services;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function sendRegistrationMail($user){
        Mail::to($user->email)->send(new WelcomeMail($user));
    }

}
