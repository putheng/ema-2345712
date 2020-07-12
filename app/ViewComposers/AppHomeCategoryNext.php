<?php

namespace App\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class AppHomeCategoryNext
{
	public function compose(View $view)
    {
    	$categoriesb = Category::whereNotNull('image')->skip(4)->take(4)->get();

        $view->with('categoriesb', $categoriesb);
    }
}