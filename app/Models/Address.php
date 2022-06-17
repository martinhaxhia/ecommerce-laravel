<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'user_id',
        'address',
        'city',
        'country',
        'zip-code',
    ];
    /**
     * @var mixed
     */
}
