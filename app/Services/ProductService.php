<?php

namespace App\Services;
use App\Models\Product;

class ProductService
{
    public function create(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
        ]);
    }
    public function imageStore(array $data){

        $file = $data->file('image');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->store('public/products');
        $image = $file->hashName();
        return $image;
    }

}
