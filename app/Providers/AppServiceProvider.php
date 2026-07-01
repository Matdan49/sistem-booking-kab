<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- SAYA TAMBAH BARIS NI

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
    // Hanya paksa HTTPS jika sistem bukan di tahap 'local'
    if (env('APP_ENV') !== 'local') {
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }
}
}