<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    	return CategoryResource::collection(
            Category::isEnable()
            ->area(1)
            ->ordered()->get()
        );
    }
}
