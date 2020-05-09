<?php

namespace App\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $view->with('categories', Category::area(1)->isParent()->isEnable()->get());
    }
}