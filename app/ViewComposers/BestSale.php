<?php

namespace App\ViewComposers;

use App\Models\Product;
use Illuminate\View\View;

class BestSale
{
    public function compose(View $view)
    {
    	$products = Product::with('image', 'category')
    		->whereIn('id', [54, 55, 56, 57])
    		->get();

        $view->with('products', $products);
    }
}