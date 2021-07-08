<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr_page = 'shop';
        $products = Product::join('ready_sales', 'products.id', 'ready_sales.product_id')
            ->where('products.supplier_id', Auth::user()->id)
            ->get([
                'products.name',
                'products.description',
                'products.quantity as product_quantity',
                'products.image',
                'ready_sales.id as ready_sale_id',
                'ready_sales.selling_price',
                'ready_sales.quantity as prepared_quantity'
            ]);
        return view('supplier.shop', compact('products', 'curr_page'));
    }

    public function search(Request $request)
    {
        $prepared = $prepared." AND p.name LIKE '%$search%' OR p.description LIKE '%$search%'";
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
        return view('supplier.shop', compact('products'));
    }

    public function productStore() {
        $sql = "SELECT id, name, quantity, unit_price, available, sku, date_created
    FROM products
    WHERE supplier_id = '$supplier_id'
    ORDER BY date_created DESC";
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
