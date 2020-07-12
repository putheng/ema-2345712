<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AppProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
    	$products = $product->category->products()->with('image', 'category')->paginate(10);

    	return view('app.detail', compact('product', 'products'));
    }
}
