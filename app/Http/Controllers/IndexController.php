<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Product;
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

        $products = Product::join('product_categories', 'product_categories.id', 'products.category_id')
            ->get(['products.id as id',
                'products.name as name',
                'product_categories.name as code',
                'products.state as state',
                'products.quantity as quantity',
                'products.unit_price as unit_price',
                'products.available as available']);
        return view('supplier.index', compact('curr_page', 'products'));
//        return $products;
    }

    public function returnController() {
        $categories = ProductCategory::select(['id', 'name'])->get();
        return response()->json($categories);
    }
}
