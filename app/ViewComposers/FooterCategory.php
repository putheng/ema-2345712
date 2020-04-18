<?php

namespace App\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class FooterCategory
{
    public function compose(View $view)
    {
    	$categories = Category::whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9])->get();

        $view->with('categories', $categories);
    }
}