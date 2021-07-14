<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        return view('supplier.shop', compact('products', 'curr_page', 'categories'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'unit_description' => 'required',
            'unit_price' => 'required',
            'sku' => 'required',
            'color' => 'required',
            'image' => 'required',
            'available'> 'required',
            'size' => 'required'
        ]);

        if($validator->errors()) {
            return response()->json($validator->errors());
        } else {
            $product = new Product();

            $product->name = $request->name;
            $product->description = $request->description;
            $product->brand = $request->brand;
            $product->quantity = $request->quantity;
            $product->unit_description = $request->unit_description;
            $product->unit_price = $request->unit_price;
            $product->color = $request->sku;
            $product->image = $request->image;
            $product->available = $request->available;
            $product->size = $request->size;
            $product->sku = $request->sku;

            $product->save();

            return response()->json(['message' => 'saved']);
        }
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
