<?php

namespace App\Models;

use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Model;

class ProductVariationType extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'name'
    ];

    public function scopeAddType($builder, $name)
    {
    	$query = $builder->where('name', $name);

    	if($query->count()){
    		return $query->first();
    	}

    	return static::create(['name' => $name]);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
    }
}
