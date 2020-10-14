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
        $store = '';

        if($product->user->type == 'store' || $product->user->type == 'admin'){
            $store = $product->user->store;

            $products = $store->user->products()->with('image', 'category')->paginate(10);

        }else{
            $products = $product->category->products()->with('image', 'category')->paginate(10);
        }

    	return view('home.product', compact('product', 'products', 'store'));
    }

    public function icons()
    {
        return view('home.icons');
    }
}
