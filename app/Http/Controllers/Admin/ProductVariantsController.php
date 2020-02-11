<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductVariantsController extends Controller
{
    public function show(Request $request, Product $product)
    {
    	$product->load(['variations.type', 'variations.stock', 'variations.product']);

    	return new ProductResource(
    		$product
    	);
    }

    public function store(Request $request, Product $product)
    {
    	
    	$variations = collect($request->variations)->each(function($value, $key) use ($product){


    		collect($value)->each(function($value, $key){
    			$variation = ProductVariation::find($value['id']);
    			
    			$variation->update([
    				'name' => $value['name'],
    				'price' => $value['price'],
    			]);

    		});
    	});

    	return response()->json([
    		'success' => true,
    		'message' => 'Variations update successfully'
    	]);
    }
}
