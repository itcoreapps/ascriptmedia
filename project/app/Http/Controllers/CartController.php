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
    	$Product = Product::find($req->product_id); 
      if($Product->image()->first() != null){       	
       $image=$Product->image()->first();
        //dd($image);
        $imageCart=$image->img_path;
       }
       
        Cart::add(array(
        'id' => $Product->id,
        'name' => $Product->p_name,
        'price' => $Product->p_price_dollar,        
        'quantity' => 1,        
        'attributes' => array(
        'priceBitcoin' =>$Product->p_price_bitcoins ,
        'priceEgy' => $Product->p_price_egp,
        'image'=>$imageCart
        ),
        'associatedModel' => $Product
        ));
       

        $cart = Cart::getContent();

          $count=$cart->count();
         return response()->json($count);

       
    

    }

    /////////// update qty for item in cart
    public function update(Request $req){
      
    	Cart::update($req->item_id,array(
     
        'quantity' => array(
        'relative' => false,
        'value' => request('qty'),
        )));
        $cart = Cart::getContent();
    	
        return response()->json(['your item updated to cart']); 
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
