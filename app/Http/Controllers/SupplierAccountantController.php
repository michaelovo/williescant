<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierAccountantController extends Controller
{
    public function index()
    {
        $curr_page = 'Accountants';
        return view('supplier.accountants', compact('curr_page'));
    }
}
