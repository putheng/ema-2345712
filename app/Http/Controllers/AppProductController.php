<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AppProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
    	$products = $product->category->products()->with('image', 'category')->paginate(10);

    	return view('app.detail', compact('product', 'products'));
    }

    public function category(Request $request, Category $category)
    {
        $products = $category->products()->paginate(20);

        if($category->parent_id == null){
            $ids = $category->children->pluck('id');

            $products = Product::whereIn('category_id', $ids)
                ->with('category')
                ->paginate(10);
        }

    	return view('app.category', compact('products', 'category'));
    }
}
