<?php

namespace App\Models;

use App\Order as OrderO;
use App\Models\Address;
use App\Models\Wishlist;
use App\Models\Agent;
use App\Models\Image;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Track;
use App\Models\Society;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Store;
use App\Models\{Transfer, Ticket};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gateway_customer_id', 'type', 'currency'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = bcrypt($user->password);
        });
    }

    public function incrementIncome($column, $amount)
    {
        // if($this->agent->status != 'pending'){
            $this->increment($column, $amount);
        // }
    }

    public function scopeIsStore($q)
    {
        return $q->where('type', 'store');
    }

    public function scopeIsCustomer($q)
    {
        return $q->where('type', 'dashboard');
    }

    public function scopeIsSupplier($q)
    {
        return $q->where('type', 'supplier');
    }

    public function scopeIsSociety($q)
    {
        return $q->where('type', 'society');
    }

    public function getPhoneAttribute()
    {
        if($this->type == 'customer'){
            return $this->customer->phone;
            
        }else if($this->type == 'store'){
            return $this->store->phone;

        }else if($this->type == 'society'){
            return $this->society->phone;

        }else if($this->type == 'supplier'){
            return $this->supplier->phone;

        }else if($this->type == 'admin'){
            return '+855085598188';
        }
    }

    public function dashboard()
    {
        return url($this->type);
    }

    public function avatar()
    {
        if($this->image){
            return $this->image->avatar();    
        }
        return url('images/empty-profile-picture.png');
    }

    /**
     * [getJWTIdentifier description]
     * @return [type] [description]
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * [getJWTCustomClaims description]
     * @return [type] [description]
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function agent()
    {
        return $this->hasOne(Agent::class);
    }

    public function cart()
    {
        return $this->belongsToMany(ProductVariation::class, 'cart_user')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function society()
    {
        return $this->hasOne(Society::class);
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function variations()
    {
        return $this->hasManyThrough(ProductVariation::class, Product::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function order()
    {
        return $this->hasMany(OrderO::class);
    }

    public function shipments()
    {
        return $this->belongsToMany(Order::class, 'delivery_order')
            ->withTimestamps();
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function sales()
    {
        $status = ['Processing', 'Completed', 'On the way', 'Shipping'];

        return $this->belongsToMany(Order::class, 'product_variation_order', 'owner_id')
            ->wherePivotIn('status', $status)
            ->withPivot('price', 'status', 'quantity', 'product_variation_id', 'order_id');
    }
}
