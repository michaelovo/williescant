<?php

namespace App\Http\Controllers;

use App\Sale;
use App\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        $all_sales = "SELECT * FROM sales WHERE supplier_id='$supplier_id'";
        $curr_page = 'sales';

        $sales = Sale::where('supplier_id', Auth::user()->id)->get();

        return view('supplier.sales', compact('sales', 'curr_page'));
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
        try {

        $sale = new Sale();

        // validation goes here

        // receipt products
        $receipt_items = $request->receipt_products;

        // customer details
        $name = $request->customer_name;

        // receipt details
        $pin = $request->pin;
        $receipt_number = $request->receipt_number;
        $total_price = $request->total_price;
        $etr = $request->etr;
        $vat = $request->vat;
        $sub_total = $request->sub_total;
        $date = $request->date;
        $time = $request->time;
        $total_items = count($receipt_items);

        $sale->fill([
            'receipt_number' => $receipt_number,
            'pin' => $pin,
            'etr' => $etr,
            'supplier_id' => Auth::user()->id,
            'sub_total' => $sub_total,
            'vat' => $vat,
            'total_price' => $total_price,
            'total_items' => $total_items,
            'customer_name' => $name,
            'date' => $date,
            'time' => $time,
            'status' => 'unset',
        ]);
        $sale->save();
        $sale_id = Sale::where('receipt_number', $receipt_number)->latest()->value('id');
        foreach ($receipt_items as $item) {
            $saleItem = new SaleItem();
            $saleItem->fill([
                'name' => $item['name'],
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'sale_id' => $sale_id,
            ]);
            $saleItem->save();
        }

        // dd($receipt_items);

        return response()->json(['status' => true]);
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json(['status' => false, 'data'=> $th, 'data' => $request->all()]);
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
        $sale = Sale::find($id);
        $products = SaleItem::where('sale_id', $id)->where('receipt_type', 'sale')->get();

        return response()->json(['status' => 'success', 'data' => $sale, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        $status = 'success';
        $items = SaleItem::where('sale_id', $id)->where('receipt_type', 'sale')->get();
        return response()->json(['status' => $status, 'data' => $sale, 'items' => $items]);
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

            $sale = Sale::find($id);
    
            // validation goes here
    
            // receipt products
            $receipt_items = $request->receipt_products;
    
            // customer details
            $name = $request->customer_name;
    
            // receipt details
            $pin = $request->pin;
            $receipt_number = $request->receipt_number;
            $total_price = $request->total_price;
            $etr = $request->etr;
            $vat = $request->vat;
            $sub_total = $request->sub_total;
            $date = $request->date;
            $time = $request->time;

            if($receipt_items != null) {
                $total_items = count($receipt_items) + count($request->old_items);
            } else {
                $total_items = count($request->old_items);
            }
            // $total_items = $receipt_items != null? count($receipt_items) + count($request->old_items): count($request->old_items);
    
            $sale->fill([
                'receipt_number' => $receipt_number,
                'pin' => $pin,
                'etr' => $etr,
                'supplier_id' => Auth::user()->id,
                'sub_total' => $sub_total,
                'vat' => $vat,
                'total_price' => $total_price,
                'total_items' => $total_items,
                'customer_name' => $name,
                'date' => $date,
                'time' => $time,
                'status' => 'unset',
            ]);
            $sale->save();

            $sale_id = $id;
            if($receipt_items != null){
            foreach ($receipt_items as $item) {
                $saleItem = new SaleItem();
                $saleItem->fill([
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'sale_id' => $sale_id,
                ]);
                $saleItem->save();
            }                
            }


            $old_items = $request->old_items;
            foreach ($old_items as $item) {
                $sale_item = SaleItem::find($item->id);
                $salItem->fill([
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'sale_id' => $sale_id
                ]);
                $saleItem->save();
            }
    
            // dd($receipt_items);
    
            return response()->json(['status' => true, 'data' => $request->all()]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => false, 'data'=> $th, 'data' => $request->all()]);
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
        $sale = Sale::where('id', $id)->delete();
        return response()->json(['status' => true]);
    }
}
