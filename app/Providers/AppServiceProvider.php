<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\SalesConnect\Interfaces\BusinessInterface', 'App\SalesConnect\Repositories\BusinessRepo');
        $this->app->bind('App\SalesConnect\Interfaces\StaffInterface', 'App\SalesConnect\Repositories\StaffRepo');
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
