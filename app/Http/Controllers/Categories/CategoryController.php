<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(
            Category::with('children')
            ->parents()
            ->area(1)
            ->ordered()->get()
        );
    }

    public function by()
    {
    	return CategoryResource::collection(
            Category::with('children')
            ->parents()
            ->area(2)
            ->ordered()->get()
        );
    }
}
