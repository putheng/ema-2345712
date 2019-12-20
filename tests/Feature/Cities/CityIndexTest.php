<?php

namespace Tests\Feature\Cities;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityIndexTest extends TestCase
{
    public function test_it_returns_cities()
    {
        $city = factory(City::class)->create();

        $user = factory(User::class)->create();

        $this->actingAs($user, 'api')->json('GET', 'api/cities')
            ->assertJsonFragment([
                'id' => $city->id
            ]);
    }

    public function test_show_cities_fails_if_unauthenticated()
    {
        $response = $this->json('GET', 'api/cities')
            ->assertStatus(401);
    }
}
