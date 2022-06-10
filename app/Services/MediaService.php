<?php

namespace App\Services;


use App\Models\Media;

use Illuminate\Support\Facades\Storage;

class MediaService
{
    protected $path = 'public/products';

    public function imageStore($file)
    {
        $file->store($this->path);

        return $file->hashName();

    }

    public function imageUpdate($file)
    {
        $image = $file->hashName();

        $file->storeAs($this->path , $image);

        return $image;
    }

    public function productCreate($file, $productId)
    {
        Media::create([
           'product_id'=> $productId,
           'name' => $file->getClientOriginalName(),
           'hash_name' => $file->hashName(),
           'mimes' => $file->getClientMimeType(),
           'path' => $file->getRealPath(),
       ]);

     return $this->imageStore($file);

   }
    public function userCreate($file, $userId)
    {
        Media::create([
            'user_id'=> $userId,
            'name' => $file->getClientOriginalName(),
            'hash_name' => $file->hashName(),
            'mimes' => $file->getClientMimeType(),
            'path' => $file->getRealPath(),
        ]);

        return $this->imageStore($file);

    }

   public function update()
   {
       //
   }

   public function delete($product)
   {

       Storage::delete($this->path . '/' . $product->image);

   }
}
