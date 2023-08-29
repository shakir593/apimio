<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductFacadeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
        public function register(): void
    {
        $this->app->bind('product', function () {
            return new \App\Facades\ProductFacade();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
