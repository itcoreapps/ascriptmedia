@extends('master')
@section('container')
<!--              start for me

 -->      <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/><script src="https://kit.fontawesome.com/a076d05399.js"></script>

 
          <!-- container -->
    <div class="container">
            <!-- row -->
           <div class="section">
            <h2>YOUR CART</h2>
            <div class="container">
              <div class="row " >
 @if(count($cart))

         @foreach($cart as $item)
          
          <div class="well col-sm-12" >
            <div class="container-fluid">
              <div class="row " >             

            <div class="col-sm-6 col-xs-12 col-md-3 ">
               <a class="btn btn-danger left  "  href="cart/delete/{{$item->id}}" style="float: left;">X</a>
               <br>
             @if( $item->attributes->has('image') )
               <img src="./img/{{$item->attributes->image}}" class="rounded mx-auto d-block" alt="..." max-width="100px" height="100px">
             @endif <br>
                    

            </div> 
            <div class="col-sm-6 col-xs-12 col-md-3 ">
                   <h4>Price</h4>
           <b> Dollar :</b><i class="fas fa-pound-sign"></i> {{$item->price}}<br>
               @if( $item->attributes->has('priceBitcoin') )
               <b> EGP :</b><i class="fas fa-pound-sign"></i> {{number_format($item->attributes->priceEgy,2)}}<br>
               @endif
               @if( $item->attributes->has('priceBitcoin') )
               <b> BitCoin :</b> <i class="fab fa-bitcoin"></i> {{number_format($item->attributes->priceBitcoin,7)}}<br>
               @endif

            </div>
            <div class="col-sm-6 col-xs-12 col-md-3 "> 
            <h4>Quantity</h4>           
              <form class="form-inline updateCart" role="form"  >
                                               @csrf
                  
                     
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                   
                    <input type="number" name="qty" value="{{$item->quantity}}" class="form-control col-sm-2  " min="0" >
                    <button  type="submit" class="btn btn-info " >OK</button>
                  
              </form>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-3 ">
              <h4>Sum price</h4>
              <b>dollar : </b> <i class="fas fa-dollar-sign"></i> {{$item->getPriceSum()}}   <br>
               @if( $item->attributes->has('priceEgy') )
               <b>EGP : </b> <i class="fas fa-pound-sign"></i> {{number_format($item->attributes->priceEgy * $item->quantity,2)}} <br>
               @endif
               @if( $item->attributes->has('priceBitcoin') )
               <b>BitCoin :</b> <i class="fab fa-bitcoin"></i> {{number_format($item->attributes->priceBitcoin * $item->quantity,7)}} 
               @endif<br>
            </div>
          </div>
            
            
          </div>
                   
              </div>     
           @endforeach 
           
           <div class="well col-sm-12 " >
            <div class="container-fluid">
            <div class="row "> 
        <div class="col-sm-6 col-xs-12 col-md-3 "> 
            <h3>Summery</h3><br>
            <b> Items: </b>  {{$cart->count()}}<br>
            <b>SubTotal :</b><br> 
            <b>Dollar :</b>
            <i class="fas fa-dollar-sign"></i>  {{\Cart::getSubTotal()}}<br>
            @if( $item->attributes->has('priceBitcoin') )
            <b> Bitcoin :  </b> <i class="fab fa-bitcoin"></i> {{number_format($item->attributes->priceBitcoin * $item->quantity * $cart->count(),7)}}<br>
            @endif
            @if( $item->attributes->has('priceEgy') )
            <b> egp :   </b><i class="fas fa-pound-sign"></i> {{number_format($item->attributes->priceEgy * $item->quantity * $cart->count(),2) }}<br>
            @endif
        </div> 
                         
          <div class="col-sm-6 col-xs-12 col-md-3"> 
            <form action="{{url('shipping')}}" method="POST">
                @csrf 
              <h3>Currency</h3><br>
                <input class="w3-radio" type="radio" name="currency" value="dollar" checked>
                <label>Dollar <i class="fas fa-dollar-sign"></i> </label><br>
                <input class="w3-radio" type="radio" name="currency" value="egp">
                <label>EgP <i class="fas fa-pound-sign"></i></label><br>
                <input class="w3-radio" type="radio" name="currency" value="bitcoin">
                <label>Bitcoin <i class="fab fa-bitcoin"></i></label><br>
          </div>
          <div class="col-sm-6 col-xs-12 col-md-3"> 
              <h3>Payment</h3><br>
              <input class="w3-radio" type="radio" name="PayType" value="visa" checked>
              <label class="label label-info">VISA</label><br>
              <input class="w3-radio" type="radio" name="PayType" value="paypal">
              <label class="label label-warning">PayPal</label><br>
          </div>
          <div class="col-sm-6 col-xs-12 col-md-3"> 
            <h3>Final Action</h3><br>
                                     <br>
            <button  type="submit" class="btn btn-info " style="margin:5px">Checkout <i class='fas fa-money-bill-alt'></i></button>
                        <a class="btn btn-danger "  href="cart/destroy ">Delete Cart</a><br>

          </div>
            </form>
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