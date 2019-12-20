<?php

namespace Tests\Unit\Models\City;

use App\Models\City;
use App\Models\ShippingMethod;
use Tests\TestCase;

class CityTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_city_has_many_shipping_methods()
    {
        $city = factory(City::class)->create();

        $city->shippingMethods()->attach(
        	factory(ShippingMethod::class)->create()
        );

        $this->assertInstanceOf(ShippingMethod::class, $city->shippingMethods->first());
    }
}
