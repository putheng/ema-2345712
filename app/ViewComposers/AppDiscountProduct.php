<?php

namespace App\ViewComposers;

use App\Models\Product;
use App\Models\Discount;
use Illuminate\View\View;

class AppDiscountProduct 
{
	public function compose(View $view)
    {
    	$discounted = Discount::get()->pluck('product_id');

    	$products = Product::whereIn('id', $discounted)->with('category', 'image')->get();

        $view->with('products', $products);
    }

}