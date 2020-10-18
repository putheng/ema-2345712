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
    const PENDING = 'Pending';
    const PROCESSING = 'Processing';
    const PAYMENT_FAILED = 'Payment failed';
    const COMPLETED = 'Completed';

    protected $fillable = [
        'status',
        'address_id',
        'shipping_method_id',
        'payment_method_id',
        'subtotal',
        'price',
        'status',
        'currency'
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

    public function scopeWithStatus($builder, $status)
    {
        if($status == 'Completed'){
            return $builder->where('status', 'Processing');
        }

        if($status == 'Completed'){
            return $builder->where('status', 'Completed');
        }

        return $builder;
    }

    public function scopeNotPending($query)
    {
        $status = ['Processing', 'Completed', 'On the way', 'Shipping', 'Finished'];

        return $query->whereIn('status', $status);
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

    public function getSubtotalAttribute($value)
    {
        if(get_currency()->current() == 'KHR' && $this->currency == 'USD'){
            $value = (int) ($value * syt_option('c_usd_rate')->cal_value);
        }

        if(get_currency()->current() == 'USD' && $this->currency == 'KHR'){
            $value = (int) ($value / syt_option('c_usd_rate')->cal_value);
        }

        return new Money($value);
    }

    public function total()
    {
        return $this->subtotal->add($this->shippingMethod->price);
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'delivery_order')
            ->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(ProductVariation::class, 'product_variation_order')
            ->withPivot(['quantity', 'owner_id', 'price', 'status'])
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
