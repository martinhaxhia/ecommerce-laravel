<?php

namespace App\Services;
use App\Models\Product;

class ProductService
{
    public function create(array $data)
    {
        $imag =$data['image'];
        $image = $imag->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $filename,
        ]);
    }

}
