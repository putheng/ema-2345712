<?php

namespace App\Http\Controllers\Rest;


use App\Http\Resources\Api\DiscountResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class BestSellController extends Controller
{
    public function index()
    {
    	$products = Product::with('image', 'category')->whereIn('id', [13, 14, 15, 16, 17, 18, 19])->get();

    	return DiscountResource::collection(
    		$products
    	);
    }
}
