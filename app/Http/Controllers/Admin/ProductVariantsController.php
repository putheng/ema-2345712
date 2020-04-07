<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Http\Requests\Variation\StoreVariationRequest;

class ProductVariantsController extends Controller
{
    public function show(Request $request, Product $product)
    {
    	$product->load(['variations.type', 'variations.stock', 'variations.product']);

    	return new ProductResource(
    		$product
    	);
    }

    public function store(StoreVariationRequest $request, Product $product)
    {	
    	$variations = collect($request->variations)->each(function($value, $key) use ($product){
            
            $type = ProductVariationType::create([
                'name' => $value['name']
            ]);

    		collect($value['options'])->each(function($value, $key) use ($type, $product){

    			$variation = new ProductVariation;
                $variation->name = $value['option'];
                $variation->price = $value['price'];
                $variation->weight = $value['weight'];
                $variation->sale_price = $value['sale_price'];
                $variation->product_variation_type_id = $type->id;
                $variation->product()->associate($product);

                $variation->save();

                if($value['stock'] > 0){

                    $stock = new Stock;
                    $stock->quantity = (int) $value['stock'];
                    $stock->product_variation_id = $variation->id;
                    $stock->save();
                    
                }

    		});
    	});

    	return response()->json([
    		'success' => true,
    		'message' => 'Variations update successfully'
    	]);
    }
}
