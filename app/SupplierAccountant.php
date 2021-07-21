<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierAccountant extends Model
{
    //
    protected $fillable = [
        'firstname', 'lastname','phonenumber','email'
    ];
}
