<?php

namespace App\ViewComposers;

use App\Models\Product;
use Illuminate\View\View;

class BestSale
{
    public function compose(View $view)
    {
    	$products = Product::with('image', 'category')
    		->whereIn('id', [13, 14, 15, 16, 17, 18, 19])
    		->get();

        $view->with('products', $products);
    }
}