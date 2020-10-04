<?php

namespace App\ViewComposers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Product\BestSell;
use Illuminate\View\View;

class AppBestSell 
{
	public function compose(View $view)
    {
    	$cids = Category::whereIn('id', [1, 2, 3, 4, 9, 11, 12, 28, 29, 30, 34, 35, 36, 37, 38, 39, 145, 183, ])
    		->get()
    		->pluck('id');


    	$products = Product::whereIn('category_id', $cids)->with('category', 'image')
    		->inRandomOrder()
		    ->limit(60)
    		->get();

        $view->with('products', $products);
    }

}