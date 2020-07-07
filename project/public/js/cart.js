$(document).ready(function() {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
//         var count='{{ \Cart::session(1)->getContent()->count() }} ';  
// $(".qtyCt").append(count);
        
    // use class selector instead of ID
    
    ///////////////////////////////////////////
     $('form.updateCart').bind('submit', function () {
         var item_id=$('input[name ="item_id"]').val();
              var qty=$('input[name ="qty"]').val();
              var _token=$('input[name ="_token"]').val();
          $.ajax({
            type: 'post',
            url: 'cart/update',
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
