<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\ProductIndexResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
    	return ProductIndexResource::collection(
            Product::isNotBlock()
            	->with('image', 'category', 'variations')
            	->orderBy('id', 'desc')
            	->paginate(30)
        );
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        return ProductIndexResource::collection(
            Product::isNotBlock()
            	->with('image', 'category', 'variations')
            	->orderBy('id', 'desc')
            	->paginate(30)
        );
    }
}
