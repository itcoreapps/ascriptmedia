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
      $cart2 = Cart::session(Auth::id())->getContent();
     
      $cart=$cart2->sortKeys();
   
     return view('cart', ['cart' => $cart]);
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
       
        Cart::session(Auth::id())->add(array(
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
       

          
          $count=$cart->count();
         return response()->json($count);

       
    

    }

    /////////// update qty for item in cart
    public function update(Request $req){
      
    	Cart::session(Auth::id())->update($req->item_id,array(
     
        'quantity' => array(
        'relative' => false,
        'value' => request('qty'),
        )));
        $cart = Cart::session(Auth::id())->getContent();
    	
        return response()->json(['your item updated to cart']); 
    }
    ////***** delete item from cart ************
    public function removeItem($id){
      Cart::session(Auth::id())->remove($id);
      $cart = Cart::session(Auth::id())->getContent();
     return back(); 

    }
    ///************************** delete cart
    public function destroy(){
      Cart::session(Auth::id())->clear();
      return response()->json(['your item deleted to cart']); 
    }
   
}
