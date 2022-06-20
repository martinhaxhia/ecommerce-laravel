<?php

namespace App\Services;


use App\Models\Address;

use Illuminate\Support\Facades\Storage;

class AddressService
{
    public function create($data, $userId)
    {
        Address::create([
            'user_id' => $userId,
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'zip_code' => $data['zip_code'],
        ]);
    }
}
