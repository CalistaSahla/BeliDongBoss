<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'seller_id',
        'name',
        'category',
        'condition',
        'price',
        'stock',
        'description',
        'thumbnail',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
