<?php

namespace App\Services;

use App\Models\Product;
use App\Services\MediaService;
use Illuminate\Support\Facades\DB;

class ProductService
{
    private $mediaService;

    public function __construct(MediaService $mediaService){
        $this->mediaService = $mediaService;
    }
    public function create(array $data)
    {
        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],

        ]);
        $file = $data['image'];
        $image = $this->mediaService->create($file, $product->id);

    }

    public function updateProduct($product, array $data)
    {
        if (!isset($data['image'])){
            $data['image'] = $product->image;
        }

        return $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],

        ]);
    }



}
