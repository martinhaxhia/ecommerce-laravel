<?php

namespace App\Services;


use App\Models\Media;

class MediaService
{
    public function imageStore($file)
    {
        $file->store('public/products');

        $image = $file->hashName();

        return $image;
    }

    public function imageUpdate($file)
    {
        $image = $file->hashName();

        $file->storeAs('public/products', $image);

        return $image;
    }
   public function create($file,$productId)
   {
       $media['name'] = $file->getClientOriginalName();
       $media['hash_name'] = $file->hashName();
       $media['mime'] = $file->getClientMimeType();
       $media['path'] = $file->getRealPath();

        Media::create([

            'product_id'=> $productId,
           'name' => $media['name'],
           'hash_name' => $media['hash_name'],
           'mimes' => $media['mime'],
           'path' => $media['path'],
       ]);

     return $this->imageStore($file);

   }

   public function update()
   {


   }
}
