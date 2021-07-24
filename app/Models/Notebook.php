<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = [
        'product_id',
        'ean',
        'name',
        'title',
        'brand',
        'brand_image',
        'product_image',
        'gift',
        'search_data',
        'price'
    ];
}
