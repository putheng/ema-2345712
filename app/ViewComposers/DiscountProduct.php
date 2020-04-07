<?php

namespace App\ViewComposers;

use App\Models\Product;
use Illuminate\View\View;

class DiscountProduct
{
    public function compose(View $view)
    {
    	$products = Product::with('image', 'category')->whereIn('id', [20, 21, 22, 23, 24, 25, 26])->get();

        $view->with('products', $products);
    }
}