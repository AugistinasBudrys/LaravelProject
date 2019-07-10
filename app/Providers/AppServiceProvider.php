<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // be sitos  israiskos meta SQLSTATE[42000]: Syntax error or access violation bandant migratint duomenu baze
        Schema::defaultStringLength(191);
    }
}
