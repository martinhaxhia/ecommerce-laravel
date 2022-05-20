<?php

namespace App\Services;


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
}
