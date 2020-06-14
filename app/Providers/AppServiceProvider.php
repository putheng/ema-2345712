<?php

namespace App\Providers;

use App\Cart\Cart;
use App\Cart\Payments\Gateway;
use App\Cart\Payments\Gateways\StripeGateway;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Track;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Stripe\Stripe;
use App\Models\Society;
use App\Models\Store;
use App\Models\TopSale;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        Relation::morphMap([
            'product' => Product::class,
            'image' => Image::class,
            'category' => Category::class,
            'user' => User::class,
            'track' => Track::class,
            'order' => Order::class,
            'transfer' => Transfer::class,
            'society' => Society::class,
            'store' => Store::class,
            'top_sale' => TopSale::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Cart::class, function ($app) {
            if ($app->auth->user()) {
                $app->auth->user()->load([
                    'cart.stock'
                ]);
            }

            return new Cart($app->auth->user());
        });

        $this->app->singleton(Gateway::class, function () {
            return new StripeGateway();
        });
    }
}
