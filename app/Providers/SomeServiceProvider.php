<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SomeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Binding atau pengaturan service Anda bisa dilakukan di sini.
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Inisialisasi service atau pengaturan lainnya bisa dilakukan di sini.
    }
}