<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'sku','size',
        'available',
        'image'];
}
