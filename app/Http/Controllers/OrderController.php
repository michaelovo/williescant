<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    /**
     * Return all orders 
     */
    public function index(){
        $curr_page = 'order';
        return view('supplier.orders');
    }
}
