<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


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

public function boot()
{
    View::composer('*', function ($view) {
        $cart = Session::get('cart', []);
        $cartCount = count($cart); // نحسب الأنواع فقط مش الكمية

        $view->with('cartCount', $cartCount);
    });
}


}
