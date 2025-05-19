<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $config = [
            'title' => 'config service provider',
            'year' => '2022',
            'author' => 'laravel',
            'theme' => 'dark'
        ];

        View::share('config', $config);
    }
}
