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
                $variation->price =  currency_convert($value['price'])->getAmount();
                $variation->weight = $value['weight'];
                $variation->sale_price = currency_convert($value['sale_price'])->getAmount();
                $variation->commission = currency_convert($value['sale_price'] - $value['price'])->getAmount();
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

    protected function getVatPrice($price)
    {
        return $price + ($price * 0.1);
    }

    public function update(Request $request, Product $product)
    {
        collect($request->variations)->each(function($value, $key) use ($product){
            collect($value)->each(function($val, $k){
                $vari = ProductVariation::find($val['id']);

                $vari->update([
                    'name' => $val['name'],
                    'price' => currency_convert($val['pricex'])->getAmount(),
                    'weight' => $val['weight'],
                    'sale_price' => currency_convert($val['sale_pricex'])->getAmount(),
                    'tax_price' => currency_convert($this->getVatPrice($val['sale_pricex']))->getAmount(),
                ]);

                $stock = Stock::where('product_variation_id', $val['id'])->first();

                if($stock){
                    $stock->update([
                        'quantity' => $val['stock']
                    ]);
                }else{
                    $vari->stocks()->create([
                        'quantity' => $val['stock']
                    ]);
                }

            });
        });

        return response()->json([
            'success' => true,
            'message' => 'Variations update successfully'
        ]);
    }
}
