<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Resources\Product\ProductIndexResource;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
        return new ProductIndexResource(
            $product
        );
    }

    public function store(ProductStoreRequest $request)
    {
    	$product = new Product;

    	$product->name = $request->name;
    	$product->price = $request->price;
    	$product->description = $request->description;
    	$product->user()->associate($request->user());

    	$product->save();

        $product->categories()->sync($request->category);

    	return (new ProductIndexResource($product))
            ->additional([
                'success' => true
            ]);
    }

    public function update(ProductStoreRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $product->update($request->only('name', 'price', 'description', 'publish'));

        $product->categories()->sync($request->category);

        if($request->variations){

            $this->attachVariants($product);
        }

        return (new ProductIndexResource($product))
            ->additional([
                'success' => true
            ]);
    }

    protected function attachVariants($product)
    {
        collect(request()->variations)->each(function($variation) use ($product){

            $type = ProductVariationType::addType($variation['name']);


            $this->attachVariantType($type, $product, $variation);

        });
    }

    protected function attachVariantType($type, $product, $variation)
    {
        collect($variation['options'])->each(function($option) use ($type, $product){

            $productvariation = new ProductVariation;

            $productvariation->name = $option['option'];
            $productvariation->price = $option['price'];
            $productvariation->weight = $option['weight'];
            $productvariation->sale_price = $option['sale_price'];
            $productvariation->product()->associate($product);
            $productvariation->product_variation_type_id = $type->id;

            $productvariation->save();

            if(!empty($option['stock'])){

                $stock = new Stock;
                $stock->quantity = (int) $option['stock'];
                $stock->product_variation_id = $productvariation->id;
                $stock->save();
                
            }
        });
        
    }

    public function index(Request $request)
    {
    	return ProductIndexResource::collection(
    		$request->user()->products()->orderBy('id', 'desc')->get()
    	);
    }
}
