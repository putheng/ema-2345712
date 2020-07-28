<?php

namespace App\Scoping\Scopes;

use App\Models\Category;
use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class CategoryScope implements Scope
{
    public function apply(Builder $builder, $value)
    {
    	if($value == null){
    		return $builder;
    	}

    	$category = Category::where('slug', $value)->first();

    	if($category->parent_id == null){
            $ids = $category->children->pluck('id');
            
            return $builder->whereHas('categories', function ($builder) use ($ids) {
	            $builder->whereIn('id', $ids);
	        });

        }

        return $builder->whereHas('categories', function ($builder) use ($value) {
            $builder->where('slug', $value);
        });
    }
}
