<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr_page = 'purchases';
        $purchases = [];
        //        $all_purchases = "SELECT * FROM purchases WHERE purchased_by='$supplier_id'";
        return view('supplier.purchases', compact('curr_page', 'purchases'));
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
     * Show tsearch results
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->pin;

        $pin = Purchase::query()->where('pin', 'LIKE', '%{$search}%')->get();
        return response()->json($pin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPurchase = new Purchase();

        // validate request
        $request->validate([
            'receipt_number' => 'required',
            'supplier_name' => 'required',
            'total_items' => 'required',
            'vat' => 'required',
            'sub_total'  => 'required',
            'etr' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'date' => 'required',
            'time' => 'required', 'status' => 'required',
            'pin'  => 'required',
            'purchased_by' => 'required',
        ]);

        $purchase = new Purchase();

        $purchase->fill([
            'pin' => $request->pin,
            'phone' => $request->pin,
            'email' => $request->pin,
            'website' => $request->pin,
            'location' => $request->pin,
            'receipt_number' => $request->pin,
            'total_price' => $request->pin,
            'vat' => $request->pin,
            'sub_total' => $request->pin,
            'date' => $request->pin,
            'time' => $request->pin,
            'total_items' => $request->pin
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::find($id);

        return response()->json($purchase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);

        return response()->json($purchase);
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
        $newPurchase = Purchase::find($id);

        // validate request
        $request->validate([
            'receipt_number' => 'required',
            'supplier_name' => 'required',
            'total_items' => 'required',
            'vat' => 'required',
            'sub_total'  => 'required',
            'etr' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'date' => 'required',
            'time' => 'required', 'status' => 'required',
            'pin'  => 'required',
            'purchased_by' => 'required',
        ]);

        $purchase = new Purchase();

        $purchase->fill([
            'pin' => $request->pin,
            'phone' => $request->pin,
            'email' => $request->pin,
            'website' => $request->pin,
            'location' => $request->pin,
            'receipt_number' => $request->pin,
            'total_price' => $request->pin,
            'vat' => $request->pin,
            'sub_total' => $request->pin,
            'date' => $request->pin,
            'time' => $request->pin,
            'total_items' => $request->pin
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
        $purchase = Purchase::where('id', $id)->delete();
        return redirect()->back();
    }
}
