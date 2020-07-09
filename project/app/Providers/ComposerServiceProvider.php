<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Cart;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
         View::composer('*', function ($view) {
        $cart = Cart::getContent();   
                        
               $total = Cart::getSubTotal();
               
            View::share('cart',$cart);
            View::share('total',$total);
        });
        
         
    }
}
