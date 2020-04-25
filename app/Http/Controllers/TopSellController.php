<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TopSellController extends Controller
{
    public function index()
    {
    	$ids = [20, 21, 22, 23, 24, 25, 26];

    	$products = Product::with('image', 'category')
    	->whereIn('id', $ids)
    	->paginate(5);

    	return view('product.topseller', compact('products'));
    }
}
