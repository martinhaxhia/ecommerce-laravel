<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);


    }



}
