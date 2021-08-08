<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\ReadySale;
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
            ])->toJson(JSON_PRETTY_PRINT);

            dd($products);
    }

    /**
     * Return all categories as a json object
     * 
     * @return \Illuminate\Http\Response
     */
    public function getCategory(){
        $categories = ProductCategory::get()->toJson(JSON_PRETTY_PRINT);
        return response($categories, 200);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code... 
            $product = new Product();

            $product->name = $request->name;
            $product->description = $request->description;
            $product->brand = $request->brand;
            $product->quantity = $request->quantity;
            $product->unit_description = $request->unit_description;
            $product->unit_price = $request->unit_price;
            $product->color = $request->color;
            $product->image = $request->name . 'images';
            if ($request->available == 'on') {
                $product->available = 1;
            } else {
                $product->available = 0;
            }
            $product->size = $request->size;
            $product->sku = $request->sku;
            $product->category_id = $request->category_id;

            $product->save();

            $product_id = Product::where('name', $request->name)->latest()->value('id');
            foreach ($request->images as $file) {
                $image = $file->store('uploads');
                $product_image = new ProductImage();
                $product_image->fill([
                    'product_id' => $product_id,
                    'image' => $image
                ]);
                $product_image->save();
            }

            return response()->json(['status' => true]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => false, 'error' => $th]);
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
        $product = Product::find($id);
        $images = ProductImage::where('product_id', $id)->get();
        return response()->json(['product' => $product, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $images = ProductImage::where('product_id', $id)->get();
        return response()->json(['product' => $product, 'images' => $images]);
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
        try {
            $product = Product::find($id);

            $available = $request->available == 'on' ? 1 : 0;
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'brand' => $request->brand,
                'quantity' => $request->quantity,
                'unit_description' => $request->unit_description,
                'unit_price' => $request->unit_price,
                'color' => $request->color,
                'available' => $available,
            ]);
            if ($request->hasFile('images')) {
                foreach ($request->images as $file) {
                    $image = $file->store('uploads');
                    $product_image = new ProductImage();
                    $product_image->fill([
                        'product_id' => $request->id,
                        'image' => $image
                    ]);
                    $product_image->save();
                }
            }
            return response()->json(['status' => true]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,  'error' => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->delete();
        return response()->json(['message' => true]);
    }

    /**
     * Delete Image from ProductImage
     * 
     */
    public function deleteImage(Request $request)
    {
        $image = ProductImage::where('product_id', $request->id)->where('id', $request->image_id)->delete();
        return response()->json(['message' => true]);
    }

    /**
     * Prepare Product
     */
    public function prepareProduct(Request $request, $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $product_quantity = $product->quantity;
            $buying_price = $product->unit_price;

            if ($product_quantity >= $request->quantity) {
                $selling_price = $buying_price + $request->profit  + $request->expenses;
                $ready_sale = new ReadySale();
                $ready_sale->fill([
                    'quantity'      => $request->quantity,
                    'selling_price' => $selling_price,
                    'buying_price'  => $buying_price,
                    'sku'           => $product->sku,
                    'product_id'    => $id
                ]);
                $ready_sale->save();

                $new_quantity = $product_quantity - $request->quantity;
                $product->quantity = $new_quantity;
                $product->update();
                return response()->json(['success' => true]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Prepared quantity is greater than available quantity in store. The quantity in store is: " . $product_quantity,
                    'sale' => [$request->quantity, $request->profit, $request->expenses]
                ]);
            }
            return response()->json([
                'status' => 'success',
                'quantity' => $product_quantity,
                'price' => $buying_price
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => $th,
                'status' => 'error',
                'message' => "Server Error: Failed to retrieve product details. Try again later"
            ]);
        }
    }

    /**
     * Get Prepared products
     */
    public function prepared()
    {

            $prepared = Product::join('ready_sales', 'products.id', 'ready_sales.product_id')
                ->join('product_images', 'products.id', 'product_images.product_id')
                ->join('product_categories', 'products.category_id', 'product_categories.id')
                ->where('products.supplier_id', Auth::user()->id)
                ->get([
                    'products.id as product_id',
                    'ready_sales.id as ready_sale_id',
                    'product_categories.name as code',
                    'products.state as status',
                    'products.brand as brand',
                    'products.name as name',
                    'products.description as description',
                    'ready_sales.selling_price as selling_price',
                    'ready_sales.quantity as prepared_quantity',
                    'product_images.image as path',
                ])->toJson(JSON_PRETTY_PRINT);

                dd($prepared);
            // return response($prepared, 200);
    }

    /**
     * Search for product
     */
    public function search(Request $request)
    {
        try {
            $prepared = Product::join('ready_sales', 'products.id', 'ready_sales.product_id')
                ->join('product_images', 'products.id', 'product_images.product_id')
                ->where('products.supplier_id', Auth::user()->id)
                ->where('name', 'LIKE', "%{$request->search}%")
                ->orWhere('description', 'LIKE', "%{$request->search}")
                ->get();
            $curr_page = 'shop';
            return view('supplier.shop', compact('prepared', 'curr_page'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Get single prepared product
     */
    public function getPreparedProduct($id)
    {
        $ready_sale = ReadySale::find($id);
        return response()->json(['status' => true, 'data' => $ready_sale]);
    }

    /**
     * update ready sale
     */

    public function updateReadySale(Request $request, $id)
    {
        // try {
        $ready_sale = ReadySale::find($id);
        $ready_sale->update([
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity
        ]);

        return response()->json(['status' => true, 'request' => $request->all(), 'data' => $ready_sale]);
        // } catch (\Throwable $th) {
        //throw $th;
        // return response()->json(['status' => true, 'error' => $th]);
        // }
    }
}
