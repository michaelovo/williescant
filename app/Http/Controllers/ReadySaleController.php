<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\ReadySale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadySaleController extends Controller
{
    public function supplierStore(){
        $curr_page = 'store';
        $sales = [];
        $purchases = [];
        return view('supplier.index', compact('sales', 'purchases', 'curr_page'));
    }
}
