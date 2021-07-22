<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'unit_price',
        'purchase_id',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($receipt_item) {
            $receipt_item->receipt_type = 'purchase';
        });
    }
}
