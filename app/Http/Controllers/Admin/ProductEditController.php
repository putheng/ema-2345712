<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductIndexResource;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Http\Requests\ProductEditRequest;

class ProductEditController extends Controller
{
    public function store(ProductEditRequest $request, Product $product)
    {
    	$product->name = $request->name;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;

        $product->commission = ($request->sale_price - $request->price);
        
        if(!empty($request->market_price) && $request->market_price != 'null'){
            $product->market_price = $request->market_price;
        }

        if(empty($request->market_price) || $request->market_price == 0){
            $product->market_price = NULL;
        }

    	$product->description = nl2br(strip_tags($request->description));

        $product->category_id = $request->category;

        $price = $request->sale_price;

        if(auth()->user()->type == 'store' && (boolean) auth()->user()->store->vat){
            $product->tax_price = $price + ($price * 0.1);
        }else{
            $product->tax_price = $price;
        }
        
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

    public function image(Request $request, Product $product)
    {
    	// dd($product);
    }
}
