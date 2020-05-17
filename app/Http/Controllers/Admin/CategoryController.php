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
            Category::with('children')->parents()->ordered()->get()
        );
	}

    public function store(CategoryStoreRequest $request)
    {
    	$category = Category::create([
            'name' => $request->name,
            'area' => $request->area,
            'parent_id' => $request->parent,
            'icon' => $request->icon,
        ]);

    	return CategoryResource::collection(
            Category::with('children')->parents()->ordered()->get()
        )->additional([
            'success' => true,
            'message' => 'Category created'
        ]);
    }

    public function show(Request $request, Category $category)
    {
    	return new CategoryResource(
    		$category
    	);
    }

    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->area = $request->area;
        if($request->order != 'null'){
            $category->order = $request->order;
        }
        
        if($request->parent != 'null'){
            $category->parent_id = $request->parent;
        }
        
        $category->save();

        return CategoryResource::collection(
            Category::with('children')->ordered()->get()
        )->additional([
            'success' => true,
            'message' => 'Category update successfully'
        ]);
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return CategoryResource::collection(
            Category::with('children')->parents()->ordered()->get()
        )->additional([
            'success' => true,
            'message' => 'Category update successfully'
        ]);
    }
}
