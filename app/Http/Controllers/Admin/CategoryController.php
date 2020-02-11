<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		return CategoryResource::collection(
            Category::ordered()->get()
        );
	}

    public function store(CategoryStoreRequest $request)
    {
    	$category = Category::create($request->only('name'));

    	return CategoryResource::collection(
            Category::with('children')->parents()->ordered()->get()
        );
    }

    public function show(Request $request, Category $category)
    {
    	return new CategoryResource(
    		$category
    	);
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
    	$category->update($request->only('name'));

    	return (new CategoryResource($category->fresh()))
    		->additional(['success' => true, 'message' => 'Category update successfully']);
    }
}
