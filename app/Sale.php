<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $fillable = [
        'receipt_number',
        'pin',
        'etr',
        'supplier_id',
        'sub_total',
        'vat',
        'total_price',
        'total_items',
        'customer_name',
        'date',
        'time',
        'status',
    ];
}
