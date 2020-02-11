<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductStoreTest extends TestCase
{
    public function test_can_store_a_product()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user, 'api')->json('POST', 'api/admin/product', [
            'title' => 'test product title',
            'description' => 'Product description',
            'price' => '9000'
        ]);

        $this->assertDatabaseHas('products', [
            'user_id' => $user->id,
            'name' => 'test product title',
            'description' => 'Product description',
            'price' => '9000'
        ]);
    }
}
