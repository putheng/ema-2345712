<?php

namespace App\ViewComposers;

use App\Models\Product;
use Illuminate\View\View;

class DiscountProduct
{
    public function compose(View $view)
    {
    	$products = Product::with('category', 'image')
    		->inRandomOrder()
		    ->limit(10)
		    ->get();

        $view->with('products', $products);
    }
}