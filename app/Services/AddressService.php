<?php

namespace App\Services;


use App\Models\Address;

use Illuminate\Support\Facades\Storage;

class AddressService
{
    public function create($file, $userId)
    {
        Address::create([
            'user_id' => $userId,
            'address' => $file,
            'city' => $file,
            'country' => $file,
            'zip-code' => $file,
        ]);
    }
}
