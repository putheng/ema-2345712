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
        if(get_currency()->current() == 'KHR'){
            $value = (int) ($value * syt_option('c_usd_rate')->cal_value);
        }

        return new Money($value);
    }

    public function getFormattedPriceAttribute()
    {
        return $this->price->formatted();
    }
}
