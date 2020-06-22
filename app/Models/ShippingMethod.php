<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Country;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    // use HasPrice;

    protected $fillable = [
    	'name', 'price'
    ];

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function getPriceAttribute($value)
    {
        return new Money($value);
    }

    public function getFormattedPriceAttribute()
    {
        if(get_currency()->current() == 'KHR'){
            $price = currency_format($this->price->amount());

            return number_format($price * syt_option('c_usd_rate')->cal_value, 2) .'៛';
        }

        return $this->price->formatted();
    }
}
