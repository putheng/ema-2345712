<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Wishlist;
use App\Models\Agent;
use App\Models\Image;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Store;
use App\Models\{Transfer, Ticket};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gateway_customer_id', 'type'
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

    public function scopeIsStore($q)
    {
        return $q->where('type', 'store');
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

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
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

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }
}
