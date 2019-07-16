<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

/**
 * Class BladeExtrasServiceProvider
 * @package App\Providers
 */
class BladeExtrasServiceProvider extends ServiceProvider
{
    /**
     * No set return type does not always return bool type
     */
    public function boot()
    {
        Blade::if('hasrole', function ($expression) {

            if (Auth::user()) {
                if (Auth::user()->hasAnyRole($expression)) {
                    return true;
                }
            }
            return false;
        });
    }
}
