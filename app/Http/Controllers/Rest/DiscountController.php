<?php

namespace App\Http\Controllers\Rest;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\DiscountResource;

class DiscountController extends Controller
{
    public function index()
    {
    	$products = Product::with('image', 'category')->whereIn('id', [20, 21, 22, 23, 24, 25, 26])->get();

    	return DiscountResource::collection(
    		$products
    	);
    }
}
