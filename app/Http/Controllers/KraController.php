<?php

namespace App\Http\Controllers;

use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class KraController extends Controller
{
    public function index()
    {
        $curr_page = 'exports';
        return view('supplier.exports', compact('curr_page'));
    }
    public function exportPurchase()
    {
        $purchase = Purchase::where('purchased_by', Auth::user()->id)
            ->where('status', 'set')
            ->get();

        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=abc.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );

        $filename = Auth::user()->username  . '_purchases_receipt_' . date("d-m-Y");
        $handle = fopen($filename, 'w');

        foreach ($purchase as $row) {
            fputcsv($handle, $row->toArray(), ';');
        }
        fclose($handle);

        return Response::download($filename, $filename . ".csv", $headers);
    }

    public function exportCurrentMonth()
    {
        $purchase = Purchase::where('created_at', Carbon::now()->month())->get();

        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=abc.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );

        $filename = Auth::user()->username  . '_purchases_receipt_' . date("d-m-Y");
        $handle = fopen($filename, 'w');

        foreach ($purchase as $row) {
            fputcsv($handle, $row->toArray(), ';');
        }
        fclose($handle);

        return Response::download($filename, $filename . ".csv", $headers);
    }
}
