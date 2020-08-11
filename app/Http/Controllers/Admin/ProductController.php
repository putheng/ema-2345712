<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Resources\Product\ProductIndexResource;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use App\Models\Stock;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Cart\Money;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return ProductIndexResource::collection(
            $request->user()->products()
                ->with('image', 'category', 'variations')
                ->orderBy('id', 'desc')
                ->paginate(30)
        );
    }

    public function owner(Request $request, Product $product)
    {
        $store = Store::byUuid($request->store);

        if($store->count()){
            $product->update([
                'user_id' => $store->first()->id
            ]);

            return response()
                ->json(['success' => true, 'message' => 'Product updated!']);
        }
    }

    public function show(Request $request, Product $product)
    {
        return new ProductIndexResource(
            $product
        );
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        return ProductIndexResource::collection(
            $request->user()->products()
                ->with('image', 'category', 'variations')
                ->orderBy('id', 'desc')
                ->paginate(20)
        );
    }

    public function store(ProductStoreRequest $request)
    {
    	$product = new Product;

    	$product->name = $request->name;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        
        if(!empty($request->market_price)){
            $product->market_price = $request->market_price;
        }

        $product->commission = ($request->sale_price - $request->price);

    	$product->description = nl2br($request->description);
    	$product->user()->associate($request->user());
        $product->category()->associate($request->category);

    	$product->save();

        $product->categories()->sync([$request->category]);

        $this->updateImage($request, $product);

    	return (new ProductIndexResource($product))
            ->additional([
                'success' => true
            ]);
    }

    protected function updateImage(Request $request, $product)
    {
        for ($i=1; $i < 5; $i++) { 
            $file = $request->file('image'. $i);

            if($file){
                $path = '/' . uniqid(true).time() . '.png';
                $fileName = $file->getClientOriginalName();
                $imageFile = file_get_contents($file->getRealPath());
                Storage::disk('public_dir')->put('products'. $path, $imageFile);

                $image = new Image;
                $image->url = $path;
                $image->user()->associate($request->user());
                $product->image()->save($image);
            }
        }
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
}
