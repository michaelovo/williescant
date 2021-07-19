<?php

namespace App\Http\Controllers;

use App\ProductCategory;
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

    public function home(){
        $curr_page  = 'store';
        $sales = [];
        return view('supplier.index', compact('curr_page', 'sales'));
    }

    public function returnController() {
        $categories = ProductCategory::select(['id', 'name'])->get();
        return response()->json($categories);
    }
}
