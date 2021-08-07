<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    /**
     * Return all orders 
     */
    public function supplierOrders(){
        $curr_page = 'order';
        return view('supplier.orders', compact('curr_page'));
    }

    public function customerOrders(){
        $curr_page = 'order';
        return view('shop.orders', compact('curr_page'));
    }

    public function cart() {
        $curr_page = 'cart';
        return view('shop.cart', compact('curr_page'));
    }

    public function shop() {
        $curr_page = 'shop';
        return view('shop.index', compact('curr_page'));
    }

    public function checkout(){
        $curr_page = 'checkout';
        return view('shop.checkout', compact('curr_page'));
    }
}
