<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\{
    CategoryComposer,
    LeftMenuComposer,
    FooterCategory,
    RecentReleases,
    DiscountProduct,
    BestSale,
    AppHomeCategory,
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
            ['product.home'], 
            AppHomeCategory::class
        );

        View::composer(
            ['product.partials.aside'], 
            LeftMenuComposer::class
        );

        View::composer(
            ['product.partials.releases'], 
            RecentReleases::class
        );

        View::composer(
            ['home.partials.global-search'], 
            CategoryComposer::class
        );

        View::composer(
            [
                'home.partials.footer',
                'product.partials.footer',
                'vendors.partials.footer',
            ], 
            FooterCategory::class
        );

        View::composer(
            ['product.partials.best'], 
            BestSale::class
        );

        View::composer(
            ['product.partials.discounted'], 
            DiscountProduct::class
        );

        View::composer(
            ['product.partials.most-release'], 
            DiscountProduct::class
        );

        View::composer(
            ['product.partials.most-but'], 
            DiscountProduct::class
        );

        View::composer(
            ['product.partials.most-cloth'], 
            DiscountProduct::class
        );
    }
}
