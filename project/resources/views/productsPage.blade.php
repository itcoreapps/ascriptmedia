<script  type="text/javascript">
$(document).ready(function() {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        
    // use class selector instead of ID

   
   


        $(".addTcart").click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form:first');

         //
       
       $.ajax({
          type: "POST",
          url: '../addToCart',
          data:form.serialize(),
          success: function(data) {
            if(data !=null){
              data=JSON.parse(data);
              var cartContent=data.cartContent;
               $("#qtyCt").text(data.count);
               var string1="";
              for(var i in cartContent){
           cartContent[i].id;
            
            string1 +=' <div class="product-widget"><div class="product-img  ">'+
           '<img src="./img/'+cartContent[i].attributes.image+'" alt="" class="cartImg"></div>'+
                        '<div class="product-body">'+
                          '<h3 class="product-name "><a href="#" class="cartName">product name: '+cartContent[i].name+' item</a></h3>'+
                         '<h4 class="product-price"><span class="qty itemQ">'+cartContent[i].quantity +'x</span>'+
                         '<span class="cartPrice">$'+cartContent[i].price+'</span></h4>'+
                        '<span class="bitPrice">bit coin '+cartContent[i].attributes.priceBitcoin+'</span></div>'+

                        '<a class="delete  delCart"  href="cart/delete/'+cartContent[i].id+'" ><i class="fa fa-close"></i></a></div>';
            
            $(".cart-list").html(string1);
             
          
            }
            
                    var string2=' <small>'+data.count+' Item(s) selected</small>'+
                      '<h5>SUBTOTAL: $'+data.subtotal+'</h5>';
                     $(".cart-summary").html(string2); 
                    
                    var suc ='     <div class="alert alert-success">'+
                    '  item has added to cart.</div>';
                     $("#sucsCart").append(suc);
                       //alert("your item has added to cart");
          }
          },
          error: function(error){
                             var fail  ='     <div class="alert alert-danger">'+
                    ' Whoops! This didn\'t add. Please try again.</div>';
                         
                     $("#sucsCart").append(fail);
            }

       });   
    
});});
</script>
@foreach($products as $pro)
                 <div class="{{$category->c_id}}">
                  <div class="col-md-4 col-xs-6" >
								<div class="product">
									<div class="product-img">
										<img src="/img/{{$pro->img_path}}" alt="">
										<div class="product-label">
											<!--<span class="sale">-30%</span>
											<span class="new">NEW</span>-->
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">{{$category->c_name}}</p>
										<h3 class="product-name"><a href="/product/{{$pro->product->p_id}}">{{$pro->product->p_name}}</a></h3>
										<h4 class="product-price"> ${{$pro->product->p_price_dollar}}</h4>
										<h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> {{$pro->product->p_price_bitcoins}}</h4>
										<!--<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>-->
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="quick-view"  onclick="window.location.href='/product/{{$pro->product->p_id}} '; "><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
									<form class="  " role="form"  >
                                                            @csrf
                  
                     
                                         <input type="hidden" name="p_id" value="{{$product->p_id}}">
                   
                                          

                                           <input type="hidden" name="qty"   min="1" >
                                           <button  type="submit" class="add-to-cart-btn addTcart "  > <i class="fa fa-shopping-cart" ></i> add to cart</button>
                  
                                             </form>
									</div>
								</div>
							</div>
						</div>
                            @endforeach
							