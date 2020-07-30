<?php

namespace App\Models;

use App\Models\Bankref;
use App\Models\Track;
use App\Cart\Money;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const PAYMENT_FAILED = 'payment_failed';
    const COMPLETED = 'completed';

    protected $fillable = [
        'status',
        'address_id',
        'shipping_method_id',
        'payment_method_id',
        'subtotal'
    ];

    protected $appends = [
        
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->status = self::PENDING;
        });

        static::created(function($model){
            $model->setID();
        });
    }

    public function scopeUuid($q, $uuid)
    {
        return $q->where('uuid', $uuid)->first();
    }

    public function setID()
    {
        $uuid = substr('000000', strlen($this->id));

        $this->uuid = 'EOT'. $uuid . $this->id;
        $this->save();
    }

    public function getSubtotalAttribute($subtotal)
    {
        return new Money($subtotal);
    }

    public function total()
    {
        return $this->subtotal;
        // return $this->subtotal->add($this->shippingMethod->price);
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

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function products()
    {
        return $this->belongsToMany(ProductVariation::class, 'product_variation_order')
            ->withPivot(['quantity'])
            ->withTimestamps();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function banks()
    {
        return $this->hasOne(Bankref::class);
    }
}
