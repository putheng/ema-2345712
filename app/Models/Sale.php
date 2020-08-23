<?php

namespace App\Models;

use App\Models\{
	ProductVariation,
	Product,
	User
};
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasPrice;

class Sale extends Model
{
	use HasPrice;

    protected $fillable = [
    	'user_id', 'owner_id', 'product_variation_id', 'quantity', 'amount', 'product_id'
    ];

 	public function user()
 	{
 		return $this->belongsTo(User::class);
 	}

 	public function scopeThisMonth($q)
 	{
 		$q->whereDate('created_at', '=', date('Y-m-d'));
 	}

 	public function getTamountAttribute()
 	{
 		return $this->amount * $this->quantity;
 	}

 	public function owner()
 	{
 		return $this->belongsTo(User::class, 'owner_id');
 	}

 	public function product()
 	{
 		return $this->belongsTo(ProductVariation::class, 'product_variation_id');
 	}

 	public function products()
 	{
 		return $this->belongsTo(Product::class, 'product_id');
 	}
}
