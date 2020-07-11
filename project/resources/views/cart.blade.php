@extends('master')
@section('container')
<!--              start for me

 --> 
 <div class="section">
          <!-- container -->
          <div class="container"><script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <!-- row -->
            <h2>YOUR CART</h2>
            <div class="row">       
 @if(count($cart))

 <div class="table-responsive-md  ">
           <table   class=" table table-hover  " style="width:100%; max-height: 500px;" id="cartTable">
              <thead >
                <tr>
                  <th  width="20%">Item Image</th>
                  
            
                  <th   width="20%">Price</th>
                  
                  <th   width="20%">Quantity</th>
                  <th   width="20%"> Sum Price</th>
                  <th   width="10%"> Action</th>
                 
                  
                </tr>
              </thead>
              <br>
              <tbody style="overflow: auto;  " class="w3-light-grey ">

                @foreach($cart as $item)
                <tr>
                   <td > 
                    @if( $item->attributes->has('image') )
                    <img src="./img/{{$item->attributes->image}}" class="rounded mx-auto d-block" alt="..." width="100px" height="100px">
                          @endif <br>
                           {{$item->name}}        

                  </td> 
                   
<!--                    price all 
 -->               <td  ><b> Dollar :</b><i class="fas fa-pound-sign"></i> {{$item->price}}<br>
                    @if( $item->attributes->has('priceBitcoin') )
                   <b> EGP :</b><i class="fas fa-pound-sign"></i> {{number_format($item->attributes->priceEgy,2)}}<br>
                   @endif
                   @if( $item->attributes->has('priceBitcoin') )
                   <b> BitCoin :</b> <i class="fab fa-bitcoin"></i> {{number_format($item->attributes->priceBitcoin,7)}}<br>
                   @endif

                  </td>
                  <td >             
                   <form class="form-inline updateCart" role="form"  >
                     

                            @csrf
  <div class="form-group">
                     
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                   
                     <input type="number" name="qty" value="{{$item->quantity}}" class="form-control  " min="0" style="width: 90px;">
                     <button  type="submit" class="btn btn-info " >OK</button>
                   </div>
                   </form>
                    </td>
                    <td ><b>dollar : </b> <i class="fas fa-dollar-sign"></i> {{$item->getPriceSum()}}   <br>
                    @if( $item->attributes->has('priceEgy') )
                     <b>EGP : </b> <i class="fas fa-pound-sign"></i> {{number_format($item->attributes->priceEgy * $item->quantity,2)}} <br>
                    @endif
                    @if( $item->attributes->has('priceBitcoin') )
                     <b>BitCoin :</b> <i class="fab fa-bitcoin"></i> {{number_format($item->attributes->priceBitcoin * $item->quantity,7)}} 
                    @endif<br>
                    </td>
                     <td> <a class="btn btn-danger "  href="cart/delete/{{$item->id}}">Remove</a>
                     </td>
                   
                   
                </tr><tr class="w3-white w3-cart-4"><td></td><td></td><td></td><td></td></tr>
                @endforeach 
            
              
              </tbody>
               <tfoot class=" bg-dark">
                 <hr>
                 <tr>
                   
                     <td  class="table-info">
                      <h4>Summery</h4><br>
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
                   </td> 
                   
                    
                      <form action="{{url('shipping')}}" method="POST">
                         @csrf 
                         <td>
                        <h4>Currency</h4><br>
                          <input class="w3-radio" type="radio" name="currency" value="dollar" checked>
                          <label>Dollar <i class="fas fa-dollar-sign"></i> </label><br>
                          <input class="w3-radio" type="radio" name="currency" value="egp">
                          <label>EgP <i class="fas fa-pound-sign"></i></label><br>
                          <input class="w3-radio" type="radio" name="currency" value="bitcoin">
                          <label>Bitcoin <i class="fab fa-bitcoin"></i></label><br>
                         </td><td>
                          <h4>Payment</h4><br>
                          <input class="w3-radio" type="radio" name="PayType" value="visa" checked>
                          <label><i class="fab fa-cc-visa" style="color: blue;
                          font-size: 40px;"></i></label><br>
                          <input class="w3-radio" type="radio" name="PayType" value="paypal">
                          <label><i class="fab fa-cc-paypal" style="color: orange;
                          font-size:40px;"></i></label><br>
                        </td><td>
                          <h4>Final Action</h4><br>

                          <a class="btn btn-danger "  href="cart/destroy ">Delete Cart</a><br>
                                     <br>
                          <button  type="submit" class="btn btn-danger ">Checkout <i class='fas fa-money-bill-alt'></i></button></td>
                      </form>
                    
                  
                 </tr>
              </tfoot>
          </table>
        </div>
         
          @endif

 
<a href='{{url("/")}}' class="btn btn-danger " >continue shopping <i class="fa fa-arrow-circle-left"></i></a>
          <hr>
</div>
  </div> </div>

@endsection