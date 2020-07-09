<?php

namespace App\Providers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

         //$id=Auth::id();
        $cart =\Cart::session(1)->getContent();
       // dd($cart);
          //View::share('cart', $cart);
    }
}
