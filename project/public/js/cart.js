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
    
});
    ///////////////////////////////////////////
     $('form.updateCart').bind('submit', function (e) {
       e.preventDefault();
         var item_id=$('input[name ="item_id"]').val();
              var qty=$('input[name ="qty"]').val();
              var _token=$('input[name ="_token"]').val();
          $.ajax({
            type: 'post',
            url: '../cart/update',
            data: {item_id:item_id,qty:qty,_token:_token},
            dataType:'json',
            success: function (data) {
              alert('your quantity updated');
            },
            error: function(){
                        alert('Whoops! This didn\'t work. Please try again.');
                    }
          });
          
          return false;
        }); 

//////////////// delete cart////////////////////////////
$(document).on('click','.deletecart',function(){
  var id=$(this).attr('id');
  if(confirm("Are you sure you want to delete item from cart ?"))
  {
    $.ajax({
       type: 'get',
       url: 'cart/delete',
       data: {id:id},
       
       success: function (data) {
              alert('your item delete from cart');
            },
       error: function(){
                        alert('Whoops! This didn\'t work. Please try again.');
                    }
    });
  }
});



         });
