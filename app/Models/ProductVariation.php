<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Collections\ProductVariationCollection;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sale;
use App\Models\ProductVariationType;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasPrice;

    protected $fillable = [
        'name', 'price', 'sale_price', 'weight', 'tax_price', 'commission',
        'price_2', 'sale_price2', 'tax_price2', 'commission_2'
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->tax_price = self::getVatPrice($model->sale_price->amount());
            $model->currency = get_currency()->current();
        });


        static::updating(function($model){
            $price = $model->sale_price->amount();

            if(auth()->user()->type == 'store' && (boolean) auth()->user()->store->vat){
                $model->tax_price = $price + ($price * 0.1);
            }else{
                $model->tax_price = $price;
            }
            
        });
    }

    protected static function getVatPrice($price)
    {
        if(auth()->user()->type == 'store' && (boolean) auth()->user()->store->vat){
            return $price + ($price * 0.1);
        }else{
            return $price;
        }
    }

    public function getPriceAttribute($value)
    {
        if ($value === null) {
            return $this->product->price;
        }

        return new Money($value);
    }

    // public function getTaxPriceAttribute($value)
    // {
    //     if ($value === null) {
    //         return $this->product->price;
    //     }

    //     return new Money($value);
    // }

    public function minStock($count)
    {
        return min($this->stockCount(), $count);
    }

    public function priceVaries()
    {
        return $this->price->amount() !== $this->product->price->amount();
    }

    public function inStock()
    {
        return $this->stockCount() > 0;
    }

    public function stockCount()
    {
        return $this->stock->sum('pivot.stock');
    }

    public function type()
    {
        return $this->hasOne(ProductVariationType::class, 'id', 'product_variation_type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders()
    { 
        return $this->belongsToMany(Order::class, 'product_variation_order')
            ->withPivot('quantity');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function stock()
    {
        return $this->belongsToMany(
            ProductVariation::class, 'product_variation_stock_view'
        )
            ->withPivot([
                'stock',
                'in_stock'
            ]);
    }

    public function newCollection(array $models = [])
    {
        return new ProductVariationCollection($models);
    }
}
