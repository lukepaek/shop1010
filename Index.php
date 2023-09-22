
             
<?php 

    require_once('Home\ItemList.php');
    
    include 'header.php';

    if($_GET['id']=='CheckOut')
	{
        include 'checkout/checkout.php';
    }
    elseif($_GET['id']=='Address')
	{
        include 'account/address.php';
    }
    elseif($_GET['id']=='YourOrder')
	{
        include 'account/YourOrder.php';
    }
    elseif($_GET['id']=='Tickets')
	{
        include 'account/SupportTickets.php';
    }
    elseif($_GET['id']=='Payment')
	{
        include 'account/Payment.php';
    }
    elseif($_GET['id']=='Profile')
	{
        include 'account/Profile.php';
    }
    elseif($_GET['id']=='WishLists')
	{
        include 'account/WishList.php';
    }
    elseif($_GET['id']=='SignUp')
	{
        include 'account/SignUp.php';
    }
    else
    {
        //include 'home/recommend.php';
        //include 'home/NewArrival.php';
        //include 'home/CountryShop.php';
        //include 'home/ItemList.php'; 

        
        ItemsList(1);
 
    }
     
    include 'footer.php';
?>

<script>
    var country = 'Country';
    $.ajax({
            type:'POST',
            url:'Products/ProductFrom.php',
            data:'Country='+country,
            success:function(msg){
                document.getElementById("Select_Country").innerHTML = msg;
            }
        });
</script>
