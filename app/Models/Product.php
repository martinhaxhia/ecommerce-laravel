<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];

    public function getImageAttribute(){
        return 'image'.$this->attributes['image'];
    }

    public function getFullImageUrlAttribute(){
        return asset('storage/products/'.$this->attributes['image']);
    }
}
