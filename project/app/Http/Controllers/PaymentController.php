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
      return view('checkout');
     //return view('login');

    }
public function makeorder(Request $req ){

	 $validatedData = request()->validate([
        'currency' => 'required',
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required| string|email|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'zipCode' => 'required|numeric',
        'tel' => 'required|integer|min:11',
        'password' => 'nullable|string| min:8',
                
        ]);

       $Total=Cart::getSubTotal();
        $pay=1;
	 if($req->currency=="Dollar"){
	 	 $Total = Cart::getSubTotal();
         $pay=1;
	 }
	 elseif ($req->currency=="EGP") {
	 	$Total=getTotalEgp();
	 	$pay=2;
	 }
	 elseif ($req->currency=="Bitcoin") {
	 	$Total=getTotalBCP();
	 	$pay=3;
	 }
	 
    	  $user = new User;

        
        $user->name= $req->firstName." ".$req->lastName;
        
        $user->email = $req->email;
        $user->address = $req->address."-".$req->city."-".$req->country;
        $user->phone = $req->tel;      
        $user->password =$req->password;
        $user->userType =2;
        $user->save();
        $order=new Order;
	    $order->u_id =$user->id;
        $order->total_cost = $Total;
        $order->bank_transaction_id ="";
        $order->payment_type =$pay ;
        $order->save();
     //dd($order->o_id);
        return redirect("/shipping/".$req->currency);

}
    public function makepay(){
    
        $total=Cart::getSubTotal();
      
        $url = "https://test.oppwa.com/v1/checkouts";
	    $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                "&amount=".$total.
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
