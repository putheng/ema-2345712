<?php

namespace App\Models;

use App\Models\{
    Category,
    Wishlist,
    Image,
    User,
    Discount,
};

use App\Models\Product\BestSell;

use App\Models\ProductVariation;
use App\Models\Traits\CanBeScoped;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use CanBeScoped, HasPrice;
    
    protected $fillable = [
        'name',
        'price',
        'description',
        'user_id',
        'publish',
        'sale_price',
        'price',
        'sale_price',
        'tax_price',
        'commission',
        'market_price',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $price = $model->sale_price->amount();

            if(auth()->user()->type == 'store' && (boolean) auth()->user()->store->vat){
                $model->tax_price = $price + ($price * 0.1);
            }else{
                $model->tax_price = $price;
            }

            $model->slug = str_slug($model->name) .'-'. Str::uuid() .'.html';

            $model->currency = get_currency()->current();


        });

        static::updating(function($model){

            if(request()->price != null && request()->sale_price){
                $price = self::exchangeCurrency(request()->price);
                $sale_price = self::exchangeCurrency(request()->sale_price);

                $model->price = $price;
                $model->sale_price = $sale_price;
                $model->commission = ($sale_price - $price);

                $model->tax_price = self::calculateTax(self::exchangeCurrency(request()->sale_price));
            }
            

            if(request()->market_price != null){
                $market_price = self::exchangeCurrency(request()->market_price);

                $model->market_price = $market_price;
            }
            
        });
    }

    public static function calculateTax($value)
    {
        if(auth()->user()->type == 'store' && (boolean) auth()->user()->store->vat){
            return $value + ($value * 0.1);
        }

        return $value;
    }

    public static function exchangeCurrency($value)
    {
        if(get_currency()->current() == 'KHR'){
            return ($value / 4100);
        }

        return $value;
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeIsNotBlock($q)
    {
        return $q->where('publish', '!=', 3);
    }

    public function getOwnerNameAttribute()
    {
        if($this->user->type == 'store'){
            return optional($this->user->store)->name;
        }

        return 'E-Market Asia Store';
    }

    public function scopeIsBlock($q)
    {
        return $q->where('publish', 3);
    }

    protected static function getVatPrice($price)
    {
        return $price + currency_convert(($price * 0.1))->getAmount();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function inStock()
    {
        return (boolean) $this->stock ? $this->stockCount() > 0 : (boolean) $this->stock;
    }

    public function stockCount()
    {
        return $this->variations->sum(function ($variation) {
            return $variation->stockCount();
        });
    }

    public function store()
    {
        return $this->user->store;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        return $this->image()->first();
    }

    public function inWishlist()
    {
        if(auth()->check()){
            return auth()->user()->wishlists->where('product_id', $this->id)->count() > 0;
        }

        return false;
        
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
    }

    public function discounted()
    {
        return $this->hasOne(Discount::class);
    }

    public function bestsell()
    {
        return $this->hasOne(BestSell::class);
    }
}
