<?php

namespace App\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class LeftMenuComposer
{
    public function compose(View $view)
    {
    	$categories = Category::with('children')->area(1)->isParent()->isEnable()->get();

        $view->with('categories', $categories);
    }
}