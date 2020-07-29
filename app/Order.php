<?php


namespace App;

use App\Models\User;
use App\Models\Track;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $appends = [
		'total', 'status'
	];


	public function getTotalAttribute()
	{
		return $this->subtotal + $this->shippingMethod->price->amount();
	}

    public function scopeUuid($q, $uuid)
    {
        return $q->where('uuid', $uuid)->first();
    }

	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function track()
    {
        return $this->morphMany(Track::class, 'trackable');
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }
}