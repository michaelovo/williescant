<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'unit_price',
        'sale_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sale) {
            $sale->receipt_type = 'sale';
        });
    }
}
