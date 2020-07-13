@extends('master')
@section('container')
<!--              start for me

 -->    <!--   <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/><script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

 
          <!-- container -->
    <div class="container">
            <!-- row -->
           <div class="section">
            <h2>YOUR CART</h2>
            <div class="container">
              <div class="row " >
 @if(count($cart))

         @foreach($cart->sortBy('id') as $item)
          
          <div class="well col-sm-12" >
            <div class="container-fluid">
              <div class="row " >             
<!-- //cart/delete/{{$item->id}}"
 -->            <div class="col-sm-6 col-xs-12 col-md-3 ">
               <a class="btn btn-danger left  "  href="{{route('cart.delete', ['id' => $item->id])}}" style="float: left;">X</a>
               <br>
             @if( $item->attributes->has('image') )
               <img src="./img/{{$item->attributes->image}}" class="rounded  d-block" alt="..." max-width="100px"  max-height="100px" height="100" width="100">
             @endif <br>
                    {{$item->name}}

            </div> 
            <div class="col-sm-6 col-xs-12 col-md-3 ">
                   <h4>Price</h4>
           <b> Dollar :</b><i class="fa fa-usd"></i> {{$item->price}}<br>
               @if( $item->attributes->has('priceBitcoin') )
               <b> EGP :</b><i class="fa fa-gbp"></i> {{number_format($item->attributes->priceEgy,2)}}<br>
               @endif
               @if( $item->attributes->has('priceBitcoin') )
               <b> BitCoin :</b> <i class="fa fa-btc"></i> {{number_format($item->attributes->priceBitcoin,7)}}<br>
               @endif

            </div>
            <div class="col-sm-6 col-xs-12 col-md-3 "> 
            <h4>Quantity</h4>           
              <form class="form-inline  " action="{{url('/cart/update')}}" role="form" method="POST" >
                                               @csrf
                  
                     
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                   
                    <input type="number" name="qty" value="{{$item->quantity}}" class="form-control col-sm-2  " min="1" >
                    <button  type="submit" class="btn btn-info " >OK</button>
                  
              </form>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-3 ">
              <h4>Sum price</h4>
              <b>dollar : </b> <i class="fa fa-usd"></i> {{$item->getPriceSum()}}   <br>
               @if( $item->attributes->has('priceEgy') )
               <b>EGP : </b> <i class="fa fa-gbp"></i> {{number_format($item->attributes->priceEgy * $item->quantity,2)}} <br>
               @endif
               @if( $item->attributes->has('priceBitcoin') )
               <b>BitCoin :</b> <i class="fa fa-btc"></i> {{number_format($item->attributes->priceBitcoin * $item->quantity,7)}} 
               @endif<br>
            </div>
          </div>
            
            
          </div>
                   
              </div>     
           @endforeach 
           
           <div class="well col-sm-12 bg-info " >
            <div class="container-fluid">
            <div class="row "> 
        <div class="col-sm-6 col-xs-12 col-md-3 "> 
            <h3>Summery</h3><br>
            <b> Items: </b>  {{$cart->count()}}<br>
            <b>SubTotal :</b><br> 
            <b>Dollar :</b>
            <i class="fa fa-usd"></i>  {{\Cart::getSubTotal()}}<br>
            
          
            <b> Bitcoin :  </b> <i class="fa fa-btc"></i>

            {{number_format( $totalpriceBitcoin,7)}}<br>
          
           
            <b> egp :   </b><i class="fa fa-gbp"></i> {{number_format($totalpriceEgp,2) }}<br>
           
         
        </div> 
                         
          >
       
          <div class="col-sm-6 col-xs-12 col-md-3"> 
            <h3>Final Action</h3><br>
                                     <br>
            <a  href="{{url('checkout')}}" class="btn btn-info " style="margin:5px">Checkout <i class='fas fa-money-bill-alt'></i></a>
                        <a class="btn btn-danger "  href="cart/destroy ">Delete Cart</a><br>

          </div>
           
      </div>
   
         </div>
        </div>
        
          @endif

 </div>
<a href='{{url("/")}}' class="btn btn-danger " >continue shopping <i class="fa fa-arrow-circle-left"></i></a>
          <hr>
</div>
  </div> </div>
@endsection