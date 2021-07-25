<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Notebook specifications
     *
     * @return HasMany
     */
    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
