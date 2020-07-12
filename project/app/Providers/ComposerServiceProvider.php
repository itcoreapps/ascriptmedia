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
            $totalpriceBitcoin=null;
            $totalpriceEgp=null;
        $cart = Cart::getContent(); 
        foreach($cart as $item){
            $totalpriceBitcoin+=$item->attributes->priceBitcoin*$item->quantity;
            $totalpriceEgp+=$item->attributes->priceEgy*$item->quantity;
        }
             
               $total = Cart::getSubTotal();
               
            View::share('cart',$cart);
            View::share('total',$total);
            View::share('totalpriceBitcoin',$totalpriceBitcoin);
            View::share('totalpriceEgp',$totalpriceEgp);
        });
        
         
    }
}
