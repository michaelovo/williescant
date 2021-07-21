<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'pin', 'phone', 'email', 'website', 'location', 'receipt_number', 'total_price', 'vat', 'sub_total', 'date', 'time', 'total_items'
    ];
}
