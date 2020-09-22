<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;

class DiscountedController extends Controller
{
    public function store(Request $request, Product $product)
    {
    	$discounted = $product->discounted();

    	if(!$discounted->count()){
    		$product->discounted()->create([
    			'enable' => true
    		]);
    	}else{
    		$discounted->first()->delete();
    	}
    }

    public function bestsell(Request $request, Product $product)
    {
    	$bestsell = $product->bestsell();

    	if(!$bestsell->count()){
    		$product->bestsell()->create([
    			'enable' => true
    		]);
    	}else{
    		$bestsell->first()->delete();
    	}
    }
}
