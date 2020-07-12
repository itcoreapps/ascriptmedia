<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     public function __construct()
    {
    	//$id=Auth::id();
        //$cart = \Cart::session(1)->getContent();
       
        // View::share('cart', $cart);
    }
    public function getTotalBCP(){
     	 $cartContent = \Cart::getContent();
     	 foreach ($cartContent as $item ) {
     	 	$totalpriceBitcoin+=$item->attributes->priceBitcoin*$item->quantity;
     	 }
     	 return $totalpriceBitcoin;

    }
    public function getTotalEgp(){
    	$cartContent = \Cart::getContent();
    	 foreach ($cartContent as $item ) {

            $totalpriceEgp+=$item->attributes->priceEgy*$item->quantity;
     	 }
     	 return  $totalpriceEgp;
    	
    }
}
