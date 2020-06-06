<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class VendorController extends Controller
{
    public function index(Request $request, Store $store)
    {
    	$user = $store->user;

    	$products = $user->products()->with('category', 'image')->paginate(30);

    	return view('vendors.index', compact('store', 'user', 'products'));
    }
}
