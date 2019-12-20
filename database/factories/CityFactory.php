<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\City;
use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
    	'name' => 'Cambodia',
        'country_id' => factory(Country::class)->create()->id,
    ];
});
