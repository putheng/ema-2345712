<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\{
    CategoryComposer,
    FooterCategory,
    DiscountProduct,
    BestSale
};

class ViewComposerServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['home.partials.global-search'], 
            CategoryComposer::class
        );

        View::composer(
            ['home.partials.footer'], 
            FooterCategory::class
        );

        View::composer(
            ['home.partials.best-sale'], 
            BestSale::class
        );

        View::composer(
            ['home.partials.discount'], 
            DiscountProduct::class
        );
    }
}