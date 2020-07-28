<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	return view('product.index');
    }

    public function home(Request $request)
    {
        if(auth()->check() && $request->token){
            auth()->user()->update(['gateway_customer_id' => $request->token]);
        }

        return view('product.home');
    }

    public function product()
    {
    	return view('product.product');
    }

    public function show(Request $request, Product $product)
    {
    	$products = $product->category->products()->with('image', 'category')->paginate(10);

    	return view('home.product', compact('product', 'products'));
    }

    public function icons()
    {
        return view('home.icons');
    }
}
