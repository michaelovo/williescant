<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadySale extends Model
{
    protected $fillable = [
        'quantity',
        'selling_price',
        'buying_price',
        'sku',
        'product_id'
    ];

    protected $attributes = [
        'fraction' => '0.5'
    ];
}
