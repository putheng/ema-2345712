<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\{
    CategoryComposer,
    FooterCategory,
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
    }
}
