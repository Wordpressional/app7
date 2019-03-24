<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') == 'testing') {
            // Because travis-ci is still not compatible with mysql 5.7 ...
            Schema::defaultStringLength(191);
        } 
        else
        {
            Schema::defaultStringLength(191);
        }

        Cashier::useCurrency(config('cart.currency'), config('cart.currency_symbol'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
