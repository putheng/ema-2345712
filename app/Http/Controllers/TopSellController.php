<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopSellController extends Controller
{
    public function index()
    {
    	return view('product.topseller');
    }
}
