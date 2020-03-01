<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Collections\ProductVariationCollection;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariationType;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasPrice;

    protected $fillable = [
        'name', 'price', 'sale_price', 'weight'
    ];

    public function getPriceAttribute($value)
    {
        if ($value === null) {
            return $this->product->price;
        }

        return new Money($value);
    }

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
        return $this->belongsToMany(Order::class, 'product_variation_order');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
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
