<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\VariationOrderResource;
use App\Models\ProductVariationOrder;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
    	$variations = $request->user()->variations->pluck('id');

    	$orders = ProductVariationOrder::whereIn('product_variation_id', $variations)
    		->get();

    	return VariationOrderResource::collection($orders);
    }
}
