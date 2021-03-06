<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $curr_page = 'shop';
        return view('supplier.index', compact('curr_page'));
    }

    public function customerIndex(){
        $curr_page = 'home';
        return view('index', compact('curr_page'));
    }
}
