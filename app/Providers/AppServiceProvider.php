<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Añade esta línea para definir la longitud por defecto de los strings
        Schema::defaultStringLength(191);
    }
}
