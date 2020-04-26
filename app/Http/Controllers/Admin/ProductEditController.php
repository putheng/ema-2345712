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
    	$product->description = nl2br($request->description);
    	$product->user()->associate($request->user());
        $product->category_id = $request->category;
        
    	$product->save();

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
    	dd($product);
    }
}