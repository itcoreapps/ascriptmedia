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
      $cart = Cart::session(Auth::id())->getContent();
     // return $cart;
       return view('cart', ['cart' => $cart]);
    }
    //add item to cart 
    public function add(Request $req){

    	$Product = Product::find($req->product_id);        	
        $image = $Product->image()->first();
       
        Cart::session(Auth::id())->add(array(
        'id' => $Product->p_id,
        'name' => $Product->p_name,
        'price' => $Product->p_price_dollar,
        'priceBitcoin'=>$Product->p_price_bitcoins,
        'priceEgy'=>$Product->p_price_egp,
        'quantity' => 1,
        'image'=>$image->img_path,
        'attributes' => array(),
        'associatedModel' => $Product
        ));
       

          $cart = Cart::session(Auth::id())->getContent();
      
         return response()->json(['your item added to cart']);

       

    }

    /////////// update qty for item in cart
    public function update(Request $req){
       $validatedData = $request->validate([
        'qty' => 'required|numeric',
        'item_id' => 'required',
       ]);
    	Cart::session(Auth::id())->update($req->item_id,array(
     
        'quantity' => array(
        'relative' => false,
        'value' => request('qty'),
        )));
        $cart = Cart::session(1)->getContent();
    	
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
