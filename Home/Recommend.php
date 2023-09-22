</br></br>
<?php 

    require_once('Home\srv\Recommend_List.php');
    RecommendList();
?>

<script>
     /*
    function AddToCart(id){

        var email = 'dymong007@gmail.com';
        $.ajax({
            type:'POST',
            url:'Cart/AddToCart.php',
            data:'id='+id+'&email='+email,
            success:function(msg){
                if(msg=='Y')
                {
                    LoadingCart(); 
                }
            }
        });
        
    }

    function LoadingCart()
    {
        $.ajax({
            type:'POST',
            url:'Cart/LoadingCart.php',
            //data:'id='+id+'&email='+email,
            success:function(msg){
                document.getElementById("mini_cart").innerHTML = msg; 
                TotalCart();
            }
        });
    }

    function TotalCart()
    {
        $.ajax({
            type:'POST',
            url:'Cart/TotalCart.php',
            //data:'id='+id+'&email='+email,
            success:function(msg){
                var cart_qty = '<a data-cart-items="' + msg + '" style="padding-top: 10px;"></a>';
                document.getElementById("cart_qty").innerHTML = cart_qty;
            }
        });
    }*/

</script>

