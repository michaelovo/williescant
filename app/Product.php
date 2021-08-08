<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\ProductImage;

class Product extends Model
{
    //
    protected $fillable = [
        'supplier_id',
        'category_id',
        'name',
        'description',
        'brand',
        'color',
        'unit_price',
        'quantity',
        'unit_description',
        'sku',
        'size',
        'available',
        'image'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->supplier_id = "6a1e2797-9337-49c9-bf16-5cb71eb67ea1";
        });
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
}
