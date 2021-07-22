<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\ReceiptImage;
use App\ReceiptItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Storage;

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

        // validate request
        $validated = Validator::make($request->all(), [
            'receipt_number' => 'required',
            'supplier_name' => 'required',
            'total_price' => 'required',
            'vat' => 'required',
            'sub_total' => 'required',
            'date' => 'required',
            'status' => 'required',
            'purchased_by' => 'required'
        ]);
        if ($validated->failed()) {
            return redirect()->back()->withFail('Error message');
        } else {
            $purchase = new Purchase();


            // Receipt products
            $receipt_products = $request->receipt_products;

            // supplier details
            $purchase->pin = $request->pin;
            $purchase->supplier_name = $request->supplier_name;
            $purchase->phone = $request->phone;
            $purchase->email = $request->email;
            $purchase->location = $request->location;
            $purchase->website = $request->website;


            $purchase->fill([
                'receipt_number' => $request->receipt_number,
                'supplier_name' => $request->supplier_name,
                'total_price' => $request->total_price,
                'vat' => $request->vat,
                'sub_total' => $request->sub_total,
                'total_items' => count($receipt_products),
                'etr' => $request->etr,
                'phone' => $request->phone,
                'location' => $request->location,
                'website' => $request->website,
                'email' => $request->email,
                'time' => $request->time,
                'status' => 'set',
                'pin' => $request->pin,
                'purchased_by' => Auth::user()->username
            ]);
            $purchase->date = Carbon::parse($request->date);

            $purchase->save();

            $receipt_item = new ReceiptItem();
            $receipt_id = Purchase::where('receipt_number', $request->receipt_number)->latest()->value('id');
            foreach ($receipt_products as $receipt_product) {
                $receipt_item->fill([
                    'name' => $receipt_product['product_name'],
                    'description' => $receipt_product['product_description'],
                    'quantity' => $receipt_product['product_quantity'],
                    'unit_price' => $receipt_product['unit_price'],
                    'purchase_id' => $receipt_id,
                ]);
                $receipt_item->save();
            }

            foreach ($request->receipts_images as $key => $file) {
                // you can also use the original name
                $name = $file->getClientOriginalName();
                $path = $file->store('uploads');

                $receipt_image = new ReceiptImage();
                $receipt_image->fill([
                    'purchase_id' => $receipt_id,
                    'name' => $name,
                    'path' => $path
                ]);

                $receipt_image->save();
            }
            // dd($name, $path);
            return redirect()->back()->withSuccess('Purchase Added!');
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
        $purchase = Purchase::find($id);

        // validate request
        $purchase->fill([
            'receipt_number' => $request->receipt_number,
            'supplier_name' => $request->supplier_name,
            'total_price' => $request->total_price,
            'vat' => $request->vat,
            'sub_total' => $request->sub_total,
            'etr' => $request->etr,
            'phone' => $request->phone,
            'location' => $request->location,
            'website' => $request->website,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'status' => $request->status,
            'pin' => $request->pin,
            'purchased_by' => $request->purchased_by
        ]);
        $purchase->update();
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
