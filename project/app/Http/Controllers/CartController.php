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
      $cart = Cart::session(1)->getContent();
     // return $cart;
       return view('cart', ['cart' => $cart]);
    }
    //add item to cart 
    public function add(Request $req){
      $imageCart="";
    	$Product = Product::find($req->product_id); 
      if($Product->image()->first() != null){       	
       $image=$Product->image()->first();
        //dd($image);
        $imageCart=$image->img_path;
       }
       
        Cart::session(1)->add(array(
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
       

          $cart = Cart::session(1)->getContent();

          // $count=$cart->count();
    
         return back();

       
    

    }

    /////////// update qty for item in cart
    public function update(Request $req){
      
    	Cart::session(1)->update($req->item_id,array(
     
        'quantity' => array(
        'relative' => false,
        'value' => request('qty'),
        )));
        $cart = Cart::session(1)->getContent();
    	
        return response()->json(['your item updated to cart']); 
    }
    ////***** delete item from cart ************
    public function removeItem($id){
      Cart::session(1)->remove($id);
      $cart = Cart::session(1)->getContent();
     return back(); 

    }
    ///************************** delete cart
    public function destroy(){
      Cart::session(Auth::id())->clear();
      return response()->json(['your item deleted to cart']); 
    }
   
}
