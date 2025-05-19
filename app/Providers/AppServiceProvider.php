<?php

namespace App\Providers;

use App\Views\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $menuItems = [
            "Home" => "/",
            "About" => "/about",
            "Contact" => "/contact",
        ];

        // view()->share('menu', $menuItems);

        // view()->composer(['movies.index', 'movies.show', 'home', '*'], function ($view) {
        //     $view->with('menu', [
        //         "Home" => "/",
        //         "About" => "/about",
        //         "Contact" => "/contact",
        //     ]);
        // });

        View::composer('*', MenuComposer::class);
    }
}
