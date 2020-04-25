<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Scoping\Scopes\CategoryScope;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
    	$products = $category->products()->paginate(10);

    	return view('product.category', compact('products', 'category'));
    }

    public function filter(Request $request)
    {
        $products = Product::with(['variations.stock'])
            ->withScopes($this->scopes())->paginate(10);

        $category = $request->category;

        return view('product.categories', compact('products', 'category'));
    }

    protected function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }
}
