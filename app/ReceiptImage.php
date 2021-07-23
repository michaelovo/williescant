<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptImage extends Model
{
    //
    protected $fillable = [
        'purchase_id',
        'name',
        'path'
    ];
}
