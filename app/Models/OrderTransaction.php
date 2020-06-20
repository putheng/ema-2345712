<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderTransaction extends Model
{
    protected $fillable = [
    	'order_id',
    	'transaction_id',
    	'payment_url',
    	'status'
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
