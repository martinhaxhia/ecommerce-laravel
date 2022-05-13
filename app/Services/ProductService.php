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

}
