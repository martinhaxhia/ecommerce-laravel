<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];
    /**
     * @var mixed
     */

    public function getImageAttribute(){
        return $this->attributes['image'];
    }

    public function getFullImageUrlAttribute(){
        if (!isset($this->featured_image)){
            return  '';
        }
        return asset('storage/products/'.$this->featured_image->hash_name);
    }

    public function images(){
        return $this->hasMany(Media::class, 'product_id');
    }

    public function getFeaturedImageAttribute(){
        return $this->images()->first();
    }

}
