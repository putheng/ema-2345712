<?php

namespace App\ViewComposers;

use App\Models\Product;
use App\Models\Product\BestSell;
use Illuminate\View\View;

class AppBestSell 
{
	public function compose(View $view)
    {
    	$best = BestSell::get()->pluck('product_id');

    	$products = Product::whereIn('id', $best)->with('category', 'image')->get();

        $view->with('products', $products);
    }

}