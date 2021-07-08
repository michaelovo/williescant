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
        $prepared = "
    SELECT p.id, p.name, p.description, p.quantity as product_quantity,
    p.image, r.id as ready_sale_id, r.selling_price, r.quantity as prepared_quantity
    FROM products p
    INNER JOIN ready_sale r
    ON p.id=r.product_id
    WHERE p.supplier_id='$supplier_id'";
        $products = Product::join('ready_sales', 'product_id', 'products.id')
            ->where('products.supplier_id', Auth::user()->id)
            ->get();

        return view('supplier.shop', compact('products'));
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
