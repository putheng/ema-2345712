<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	return view('home.home');
    }

    public function product(Request $request)
    {
    	$product = Product::find(11);

    	return view('home.product', compact('product'));
    }
}
