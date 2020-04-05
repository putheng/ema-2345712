<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	return view('home.home');
    }

    public function product(Request $request)
    {
    	return view('home.product');
    }
}
