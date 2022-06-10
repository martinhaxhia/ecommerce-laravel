<?php

namespace App\Services;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Services\MediaService;

use Illuminate\Support\Facades\Mail;

class UserService
{
    private $mediaService;

    public function __construct(MediaService $mediaService){
        $this->mediaService = $mediaService;
    }
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],

        ]);
        $file = $data['image'];
        $image = $this->mediaService->userCreate($file, $user->id);

        return $this->sendRegistrationMail($user);
    }

    public function sendRegistrationMail($user){
        Mail::to($user->email)->send(new WelcomeMail($user));
    }

}
