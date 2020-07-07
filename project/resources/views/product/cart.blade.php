@extends('layouts.master')

@section('cart')
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
                   <td > <img src="./img/{{$item->image}}" class="rounded mx-auto d-block" alt="..." width="100px" height="100px">
                                    

</td> 
                   <td >{{$item->name}}</td>
<!--                    price all 
 -->               <td ><b> $ </b>{{$item->price}} </td>
                   <td ><b> BitCoin</b><br>{{$item->priceBitcoin}}</td>
                   <td ><b> egp </b><br> {{$item->priceEgy}}</td>   
                   <td >
 <form class="form-horizontal updateCart" role="form"  >
                     

@csrf

                     
                  <input type="hidden" name="item_id" value="{{$item->id}}" class="form-control">
                   
                     <input type="number" name="qty" value="{{$item->quantity}}" class="form-control">
                    </td>
                    <td ><b> $</b> {{$item->getPriceSum()}}   </td>
                    <td > <b>egp </b><br>{{$item->getPriceEgySum()}} </td>
                    <td > <b>BitCoin</b> <br>{{$item->getPriceBitSum()}} </td>


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
                     <b>SubTotal Bitcoin :  </b>  {{\Cart::getSubBitTotal()}}<br>
                     <b>SubTotal egp :   </b> {{\Cart::getSubEgyTotal()}}<br>
                   </td>
                 </tr>
              </tfoot>
          </table>
        </div>
          <a href='{{url("shipping")}}' class="btn btn-danger ">Checkout <i class="fa fa-arrow-circle-right"></i></a>
          <hr>
          @endif
 </div> </div> </div>

@endsection