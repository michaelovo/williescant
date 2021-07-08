<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index() {
        $curr_page = '';
        return view('index', compact('curr_page'));
    }

    public function customerOrders() {
        return view('customer.order');
    }

    public function kra() {
        $curr_page = 'kra';
        $purchases = [];
        $sales = [];
        return view('supplier.kra', compact('curr_page', 'purchases', 'sales'));
    }
}
