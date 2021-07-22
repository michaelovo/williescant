<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Purchase extends Model
{
    protected $fillable = [
        'receipt_number',
        'supplier_name',
        'total_price',
        'vat',
        'sub_total',
        'total_items',
        'etr',
        'phone',
        'location',
        'website',
        'email',
        'date',
        'time',
        'status',
        'pin',
        'purchased_by'
    ];

    protected $attributes = [
        'etr' => 'null',
        'phone' => 'null',
        'location' => 'null',
        'website' => 'null',
        'email' => 'null',
        'time' => 'null',
        'pin' => 'null',
    ];
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($purchase) {
    //         $purchase->etr = 'null';
    //         $purchase->phone = 'null';
    //         $purchase->location = 'null';
    //         $purchase->website = 'null';
    //         $purchase->email = 'null';
    //         $purchase->time = 'null';
    //         $purchase->pin = 'null';
    //     });
    // }
}
