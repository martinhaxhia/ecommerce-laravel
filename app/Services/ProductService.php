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
        Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
        ]);
        $file = $data['image'];

        $productId = DB::getPdo()->lastInsertId();

        $image = $this->mediaService->create($file,$productId);
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
