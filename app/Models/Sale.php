<?php

namespace App\Models;

use App\Models\{
	ProductVariation,
	User
};
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
    	'user_id', 'owner_id', 'product_variation_id', 'quantity', 'amount', 'product_id'
    ];

 	public function user()
 	{
 		return $this->belongsTo(User::class);
 	}

 	public function owner()
 	{
 		return $this->belongsTo(User::class, 'owner_id');
 	}

 	public function product()
 	{
 		return $this->belongsTo(ProductVariation::class, 'product_variation_id');
 	}
}
