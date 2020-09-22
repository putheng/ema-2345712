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
    AppHomeCategoryNext,
    AppDiscountProduct,
    AppBestSell
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
            ['product.home'], 
            AppHomeCategoryNext::class
        );

        View::composer(
            ['product.partials.aside', 'app.partials.aside'], 
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
            ['product.partials.best', 'app.partials.maylike'], 
            BestSale::class
        );

        View::composer([
                'product.partials.discounted',
                'app.partials.discounted',
            ],
            DiscountProduct::class
        );

        // App
        View::composer([
                'app.partials.discounted',
            ],
            AppDiscountProduct::class
        );

        View::composer([
                'app.partials.best-sale',
            ],
            AppBestSell::class
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
