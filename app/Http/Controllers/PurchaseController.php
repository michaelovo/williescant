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
        $purchases = Purchase::where('purchased_by', Auth::user()->username)->get();
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
     * Import purchase for inventory page
     */
    public function importPurchase()
    {
        $purchase = Purchase::all();
        return response()->json($purchase);
    }

    // /**
    //  * Show tsearch results
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function search(Request $request)
    // {
    //     $search = $request->pin;

    //     $pin = Purchase::query()->where('pin', 'LIKE', '%{$search}%')->get();
    //     return response()->json($pin);
    // }

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
                $item = json_decode($receipt_product);
                $receipt_item->fill([
                    'name' => $item->name,
                    'description' => $item->description,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'purchase_id' => $receipt_id,
                ]);
                $receipt_item->save();
            }

            foreach ($request->images as $file) {
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

            return response()->json(['status' => true, 'data' => $request->all()]);
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
        $receipt_items = ReceiptItem::where('purchase_id', $id)->get();
        $receipt_images = ReceiptImage::where('purchase_id', $id)->get();

        return response()->json([
            'status' => true, 
            'purchase' => $purchase, 
            'items' => $receipt_items,
            'images' => $receipt_images,
            'item_count' => count($receipt_items)
        ]);
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
        $receipt_items = ReceiptItem::where('purchase_id', $id)->get();
        $receipt_images = ReceiptImage::where('purchase_id', $id)->get();

        return response()->json([
            'status' => true,
            'purchase' => $purchase, 
            'receipt_items' => $receipt_items,
            'receipt_images' => $receipt_images
        ]);
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

    /**
     * Remove the purchase receipt image
     */
    public function delete(Request $request, $id){
        $image = ReceiptImage::where('id', $id)->where('purchase_id', $request->purchase_id)->delete();
        return response()->json(['status' => true]);
    }

    /**
     * Search for purchase KRA-PIN
     * 
     */

     public function search($id){
        $purchase = Purchase::where('pin', $id)->first();
        return response()->json(['status' => true, 'data' => $purchase]);
     }
}
