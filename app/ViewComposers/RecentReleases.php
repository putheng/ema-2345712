<?php

namespace App\ViewComposers;

use App\Models\Product;
use Illuminate\View\View;

class RecentReleases
{
    public function compose(View $view)
    {
    	$products = Product::with('category', 'user', 'user.store', 'image')
    		->orderBy('id', 'desc')
		    ->limit(30)
		    ->get();

        $view->with('products', $products);
    }
}