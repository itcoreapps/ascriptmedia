<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //

    public function index(){

     if(Auth::check())
     return view('checkout');
     else
     	return view('login');

    }

    public function makeOrder(){
    	 $validatedData = $request->validate([
        'currency' => 'required',
        'first-name' => ['required', 'string', 'max:255'],
        'last-name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'address' => ['required', 'string','max:255'],
        'city' => ['required', 'string','max:255'],
        'country' => ['required', 'string','max:255'],
        'zip-code' => ['required', 'string','max:255'],
        'tel' => ['required', 'string','max:255'],
        'orderNote' =>[ 'string', 'max:255'],
        'payment' => 'required',
        
        ]);





       $currency = $req->currency;
       if($currency=="bitcoin"){

       }
       else{
       $url = "https://test.oppwa.com/v1/checkouts";
	   $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                "&amount=92.00" .
                "&currency=EUR" .
                "&paymentType=DB";

	   $ch = curl_init();
	   curl_setopt($ch, CURLOPT_URL, $url);
	   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	   curl_setopt($ch, CURLOPT_POST, 1);
	   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	   $responseData = curl_exec($ch);
	   if(curl_errno($ch)) {
		return curl_error($ch);
	   }
	   curl_close($ch);
	   return $responseData;


       }

    }
}
