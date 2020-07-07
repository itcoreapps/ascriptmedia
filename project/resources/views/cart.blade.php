@extends('master')
@section('container')
<!--              start for me

 --> 
 <div class="section">
          <!-- container -->
          <div class="container">
            <!-- row -->
            <h2>YOUR CART</h2>
            <div class="row">       
 @if(count($cart))
 <div class="table-responsive-md">
           <table   class=" table-hover table table-striped table-bordered" style="width:100%; max-height: 500px;" id="cartTable">
              <thead class="thead-dark bg-info " style="background: #3e273b;color:#ffffff;">
                <tr>
                  <th class="text-center bg-dark" width="20%">Item Image</th>
                  <th class="text-center bg-dark" width="10%">Item Name</th>
            
                  <th colspan="3" class="text-center bg-dark" width="20%">Price</th>
                  
                  <th class="text-center bg-dark" width="10%">Quantity</th>
                  <th colspan="3" class="text-center bg-dark" width="25%"> Qty Price</th>
                  
                  <th class="text-center bg-dark"width="7%">Update</th>
                  <th class="text-center bg-dark"width="7%">Del</th>
                </tr>
              </thead>
              <tbody style="overflow: auto">
                @foreach($cart as $item)
                <tr>
                   <td > 
                    @if( $item->attributes->has('image') )
                    <img src="./img/{{$item->attributes->image}}" class="rounded mx-auto d-block" alt="..." width="100px" height="100px">
                          @endif          

</td> 
                   <td >{{$item->name}}</td>
<!--                    price all 
 -->               <td ><b> $ </b>{{$item->price}} </td>
                   @if( $item->attributes->has('priceBitcoin') )
                   <td ><b> BitCoin</b><br>{{number_format($item->attributes->priceBitcoin,7)}}</td>
                   @endif
                   @if( $item->attributes->has('priceEgy') )
                   <td ><b> egp </b><br> {{number_format($item->attributes->priceEgy,2)}}</td> 
                   @endif  
                   <td >
 <form class="form-horizontal updateCart" role="form"  >
                     

@csrf

                     
                  <input type="hidden" name="item_id" value="{{$item->id}}" class="form-control">
                   
                     <input type="number" name="qty" value="{{$item->quantity}}" class="form-control">
                    </td>
                    <td ><b> $</b> {{$item->getPriceSum()}}   </td>
                    @if( $item->attributes->has('priceEgy') )
                    <td > <b>egp </b><br>{{number_format($item->attributes->priceEgy * $item->quantity,2)}} </td>
                    @endif
                    @if( $item->attributes->has('priceBitcoin') )
                    <td > <b>BitCoin</b> <br>{{number_format($item->attributes->priceBitcoin * $item->quantity,7)}} </td>
                    @endif

                    <td > 
                    <div class=" btn-group btn-group-sm"  role="group">  
                      <input type="submit" class="btn btn-info " value="OK">
                      
                   </form>
            </div></td><td>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->              
                   

  <a class="btn btn-danger "  href="cart/delete/{{$item->id}}">X</a>
                   
                     
                   
                   
                       </td>
                </tr>
                @endforeach 
            
              
              </tbody>
               <tfoot class="text-center bg-dark">
                 <hr>
                 <tr>
                   
                     <td colspan="11" class="table-info">

                    <b> Items: </b>  {{$cart->count()}}<br>
                     <b>SubTotal dollar :  </b>  $ {{\Cart::getSubTotal()}}<br>
                      @if( $item->attributes->has('priceBitcoin') )
                     <b>SubTotal Bitcoin :  </b>  {{number_format($item->attributes->priceBitcoin * $item->quantity * $cart->count(),7)}}<br>
                      @endif
                     @if( $item->attributes->has('priceEgy') )
                     <b>SubTotal egp :   </b> {{number_format($item->attributes->priceEgy * $item->quantity * $cart->count(),2) }}<br>
                      @endif
                   </td>
                 </tr>
              </tfoot>
          </table>
        </div>
          <a href='{{url("shipping")}}' class="btn btn-danger "> <i class="fa fa-arrow-circle-left">
   Checkout </i></a> <a href='{{url("/")}}' class="btn btn-danger " style="float:right;">continue shopping <i class="fa fa-arrow-circle-right"></i></a>
          <hr>
          @endif
 </div> </div> </div>

@endsection