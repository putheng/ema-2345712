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

    public function getPriceAttribute($value)
    {
        if(get_currency()->current() == 'KHR'){
            return ($value * 4100);
        }

        return $value;
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function getFormattedPriceAttribute()
    {
        if(get_currency()->current() == 'KHR'){
            return number_format($this->price, 2) .'៛';
        }

        return '$'.number_format($this->price, 2);
    }
}
