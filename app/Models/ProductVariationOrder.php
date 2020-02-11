<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class ProductVariationOrder extends Model
{
    protected $table = 'product_variation_order';

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
