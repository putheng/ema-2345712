<?php

namespace App\Models;

use App\Models\{
    Category,
    Wishlist,
    Image,
    User
};
use App\Models\ProductVariation;
use App\Models\Traits\CanBeScoped;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'user_id',
        'publish',
        'sale_price'
    ];

    use CanBeScoped, HasPrice;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $price = $model->sale_price->amount();
            $model->tax_price = $price + ($price * 0.1);

            $model->slug = str_slug($model->name) .'-'. time() .'.html';
        });

        static::updating(function($model){
            $price = $model->sale_price->amount();
            $model->tax_price = $price + ($price * 0.1); 
        });
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
        return $this->stockCount() > 0;
    }

    public function stockCount()
    {
        return $this->variations->sum(function ($variation) {
            return $variation->stockCount();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        return $this->image()->first();
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
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
}
