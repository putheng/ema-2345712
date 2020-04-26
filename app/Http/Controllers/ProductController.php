<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	return view('product.index');
    }

    public function product()
    {
    	return view('product.product');
    }

    public function show(Request $request, Product $product)
    {
    	$products = $product->category->products()->paginate(10);

    	return view('home.product', compact('product', 'products'));
    }

    public function icons()
    {
        return view('home.icons');
    }
}
