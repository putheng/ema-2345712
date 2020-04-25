<?php

namespace App\Models;

use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
	protected $fillable = [
		'quantity'
	];

    public function variation()
    {
    	return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }
}
