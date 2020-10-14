<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AppProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
        $store = '';

        if($product->user->type == 'store' || $product->user->type == 'admin'){
            $store = $product->user->store;

            $products = $store->user->products()->with('image', 'category')->paginate(10);
        }else{
            
            $products = $product->category->products()->with('image', 'category')->paginate(10);
        }

    	return view('app.detail', compact('product', 'products', 'store'));
    }

    public function category(Request $request, Category $category)
    {
        $products = $category->products()->paginate(20);

        if($category->parent_id == null){
            $ids = $category->children->pluck('id')->toArray();
            $ids = array_merge($ids, [$category->id]);

            $products = Product::whereIn('category_id', $ids)
                ->with('category')
                ->paginate(10);
        }

    	return view('app.category', compact('products', 'category'));
    }
}
