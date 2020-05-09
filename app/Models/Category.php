<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Product;
use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrderable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasChildren, IsOrderable;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'icon',
        'enable',
        'parent_id',
        'area',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->slug = str_slug($model->name);
        });
    }

    public function scopeArea($q, $area)
    {
        return $q->where('area', $area);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeIsEnable($q)
    {
        return $q->where('enable', true);
    }

    public function scopeIsParent($q)
    {
        return $q->where('parent_id', null);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
