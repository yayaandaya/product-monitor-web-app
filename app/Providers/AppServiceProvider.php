<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("App\Interfaces\\ProductInterface", "App\Repositories\\ProductRepository");
        $this->app->bind("App\Interfaces\\ProductPhotoInterface", "App\Repositories\\ProductPhotoRepository");
        $this->app->bind("App\Interfaces\\ProductPriceHistoryInterface", "App\Repositories\\ProductPriceHistoryRepository");
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
