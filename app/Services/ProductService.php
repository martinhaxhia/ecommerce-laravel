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

    public function update(array $data)
    {
        return  Product::update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],

        ]);
    }

    public function imageStore($file){

        $file->store('public/products');
        $image = $file->hashName();
        return $image;
    }

}
