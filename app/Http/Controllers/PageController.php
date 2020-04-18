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

    public function show(Request $request, Product $product)
    {
    	return view('home.product', compact('product'));
    }

    public function cart()
    {
        return view('home.cart');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function about()
    {
        return view('home.about');
    }

    public function stores()
    {
        return view('home.stores');
    }

}
