<?php

namespace App\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class AppHomeCategory
{
	public function compose(View $view)
    {
    	$categories = Category::whereNotNull('image')->take(4)->get();

        $view->with('categories', $categories);
    }
}