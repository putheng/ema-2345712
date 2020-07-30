<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Bankref extends Model
{
	protected $fillable = [
		'order_id', 'bank_name', 'bank_ref'
	];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
