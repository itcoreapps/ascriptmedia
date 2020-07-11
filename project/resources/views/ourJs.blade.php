<script src="{{asset('js/jquery.min.js')}}"></script>

<script>
    $(document).ready(function(){
        var cat;
       
       
        @foreach(App\Models\Category::all() as $catCheck)
        $("#category-{{$catCheck->c_id}}").change(function() {
           
            $( "#indexDel" ).empty();
         

           if($(this).is(":checked"))
            {
              
                
              cat=$("#category-{{$catCheck->c_id}}").val();
              
               $.ajax({
                type: 'get',
                dataType: 'html',
                url: '{{url("/productsCat")}}/'+cat ,
              
                success:function(response){
                   
                   
                    $("#productData").append(response);
                }
            });
                
            }
           
           

           
            
         else if($(this).is(":not(:checked)"))
            {
             
                $(".{{$catCheck->c_id}}").remove();
           
            
            }
           
            if(!$(".checkSingle").is(":checked"))
            {
                $.ajax({
                type: 'get',
                dataType: 'html',
                url: '{{url("/productsCatDel")}}',
                 
                success:function(response){
                    
                   
                    $("#productData").append(response);
                }
            });
               
            }
          
        });
           
       

     @endforeach
    });
</script>