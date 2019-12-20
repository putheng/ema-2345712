<?php

namespace App\Models;

use App\Models\Country;
use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
    	'name',
    	'country_id'
    ];

    public $timestamps = false;

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function shippingMethods()
    {
        return $this->belongsToMany(ShippingMethod::class);
    }
}
