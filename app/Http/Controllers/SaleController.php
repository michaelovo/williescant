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
        $sale = new Sale();

        // validation goes here

        // receipt products
        $receipt_items = $request->receipt_items;

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
                'name' => $item['product_name'],
                'description' => $item['product_description'],
                'quantity' => $item['product_quantity'],
                'unit_price' => $item['product_unit_price'],
                'sale_id' => $sale_id,
            ]);
            $saleItem->save();
        }

        // dd($receipt_items);

        return redirect()->back()->withSuccess('Purchase Added!');
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

        return response()->json($sale);
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
        $newSale = new Sale();

        $request->validate([
            'receipt_number' => 'required',
            'pin' => 'required',
            'etr' => 'required',
            'supplier_id' => 'required',
            'sub_total' => 'required',
            'vat' => 'required',
            'total_price' => 'required',
            'total_items' => 'required',
            'customer_name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'status' => 'required',
        ]);

        $newSale->fill([
            'receipt_number' => $request->receipt_number,
            'pin' => $request->receipt_number,
            'etr' => $request->receipt_number,
            'supplier_id' => $request->receipt_number,
            'sub_total' => $request->receipt_number,
            'vat' => $request->receipt_number,
            'total_price' => $request->receipt_number,
            'total_items' => $request->receipt_number,
            'customer_name' => $request->receipt_number,
            'date' => $request->receipt_number,
            'time' => $request->receipt_number,
            'status' => $request->receipt_number,
        ]);

        return redirect()->back();
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
