<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Cart;

use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //show cart
    public function index(){
     
      return view('cart');
    }
    ////////////////////////////add item to cart 
    public function add(Request $req){
      $imageCart="img";
    	$Product = Product::find($req->p_id); 
      if($Product->images()->first() != null){       	
       $image=$Product->images()->first();
        //dd($image);
        $imageCart=$image->img_path;
       }
       
        Cart::add(array(
        'id' => $Product->p_id,
        'name' => $Product->p_name,
        'price' => $Product->p_price_dollar,        
        'quantity' => abs($req->qty),        
        'attributes' => array(
        'priceBitcoin' =>abs($Product->p_price_bitcoins) ,
        'priceEgy' => abs($Product->p_price_egp),
        'image'=>$imageCart
        ),
        'associatedModel' => $Product
        ));
       

        $cartContent = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        $count=$cartContent->count();
         $cart=['cartContent'=>$cartContent,'subtotal'=>$subtotal,'count'=>$count];
         // $count=$cart->count();
         return response()->json(json_encode($cart));

       
    

    }

    /////////// update qty for item in cart
    public function update(Request $req){
      
    	Cart::update($req->item_id,array(
     
        'quantity' => array(
        'relative' => false,
        'value' => request('qty'),
        )));
        $cart = Cart::getContent();
    	
       return back();  
    }
    ////***** delete item from cart ************
    public function removeItem($id){
      Cart::remove($id);
      $cart = Cart::getContent();
     return back(); 

    }
    ///************************** delete cart
    public function destroy(){
      Cart::clear();
      return back(); 
    }
   
}
