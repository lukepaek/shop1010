<!DOCTYPE html>
<!-- saved from url=(0060)https://www.pxdraft.com/wrap/shopapp/html/home/index-10.html -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!-- metas -->
        <meta name="author" content="pxdraft">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <meta name="keywords" content="ShopApp - eCommerce Bootstrap 5 Template">
        <meta name="description" content="ShopApp - eCommerce Bootstrap 5 Template"><!-- title -->
        <title>ShopApp - eCommerce Bootstrap 5 Template</title><!-- Favicon -->
        
        <link rel="shortcut icon" href="https://www.pxdraft.com/wrap/shopapp/assets/img/favicon.ico"><!-- CSS Template -->
        <link href="./Resources/Css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    </head>
  
    <body onload="LoadingCart()">
        <!-- skippy --> 
        <a id="skippy" class="skippy visually-hidden-focusable overflow-hidden" href="https://www.pxdraft.com/wrap/shopapp/html/home/index-10.html#content">
            <div class="container"><span class="u-skiplink-text">Skip to main content</span></div>
        </a><!-- End skippy -->
        
        <!-- Preload -->
        <div id="loading" class="loading-preloader d-none" style="display: none;">
            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
        </div><!-- End Preload -->
                
        <?php
            include 'header/TopHeader.php'; 
            include 'modal/quickview_form.php';
        ?>

        <div id="mini_cart"></div>

        <!-- script start --><!-- jquery -->
        <script src="./Resources/Js/jquery-3.5.1.min.js.download"></script><!--bootstrap-->
        <script src="./Resources/Js/bootstrap.bundle.min.js.download"></script><!-- slick carousel -->
        <script src="./Resources/Js/swiper-bundle.min.js.download"></script><!-- magnific -->
        <script src="./Resources/Js/jquery.magnific-popup.min.js.download"></script><!-- isotope -->
        <script src="./Resources/Js/isotope.pkgd.min.js.download"></script><!-- count-down -->
        <script src="./Resources/Js/jquery.countdown.min.js.download"></script><!-- count-down -->
        <script src="./Resources/Js/jarallax-all.js.download"></script><!-- Theme Js -->
        <script src="./Resources/Js/custom.js.download"></script>
        <script src="./Resources/Js/theme.js.download"></script>
        <script src="./Resources/Js/color-modes.js.download"></script><!-- End script start -->
        
        <script>

            var email = 'dymong007@gmail.com';
            function LoadingCart()
            {
                $.ajax({
                    type:'POST',
                    url:'Cart/LoadingCart.php',
                    //data:'id='+id+'&email='+email,
                    success:function(msg){
                        document.getElementById("mini_cart").innerHTML = msg;
                        TotalCart('N');
                    }
                });
            }

            function TotalCart(Remove)
            {
                $.ajax({
                    type:'POST',
                    url:'Cart/TotalCart.php',
                    data:'Remove='+Remove,
                    success:function(msg){
                        var cart_qty = '<a data-cart-items="' + msg + '" style="padding-top: 10px;"></a>';
                        document.getElementById("cart_qty").innerHTML = cart_qty;
                        document.getElementById("total_cartqty").innerHTML = 'Your Cart (' + msg + ')';
                        
                    }
                });
            }

            function RemoveCart(id)
            {
                
                
                $.ajax({
                    type:'POST',
                    url:'Cart/RemoveCart.php',
                    data:'id='+id+'&email='+email,
                    success:function(msg){
                        if(msg=='Y')
                        {
                            CartRemove(id);
                            var row = document.getElementById('li' + id);
                            if(row){row.remove();}
                            TotalCart('Y');
                        }
                    }
                });
            }

            function AddToCart(id)
            {
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

            function CartMinus(id)
            {
                var txt_qty = $('#txt_qty' + id).val();
                txt_qty = (txt_qty * 1) - 1;
                if(txt_qty < 1) {return false;}
                $('#txt_qty' + id).val(txt_qty);

                var txt_price = $('#txt_price' + id).val();
                var txt_subtotal = $('#txt_subtotal').val();

                txt_subtotal = parseFloat((txt_subtotal * 1) - (txt_price * 1)).toFixed(2); 
                $('#txt_subtotal').val(txt_subtotal);
                $('#sub_total').html('$' + txt_subtotal);

                var tax = parseFloat(txt_subtotal * 0.1).toFixed(2); 
                $('#tax').html('$' + tax);

                var total = parseFloat((txt_subtotal * 1.1)).toFixed(2); 
                $('#total').html('$' + total);

            }

            function CartPlus(id)
            {
                var txt_qty = $('#txt_qty' + id).val();
                txt_qty = (txt_qty * 1) + 1;
                $('#txt_qty' + id).val(txt_qty);

                var txt_price = $('#txt_price' + id).val();
                var txt_subtotal = $('#txt_subtotal').val();

                txt_subtotal = parseFloat((txt_subtotal * 1) + (txt_price * 1)).toFixed(2); 
                $('#txt_subtotal').val(txt_subtotal);
                $('#sub_total').html('$' + txt_subtotal);

                var tax = parseFloat(txt_subtotal * 0.1).toFixed(2); 
                $('#tax').html('$' + tax);

                var total = parseFloat((txt_subtotal * 1.1)).toFixed(2); 
                $('#total').html('$' + total);
            }

            function CartRemove(id)
            {
                var txt_qty = $('#txt_qty' + id).val();
                var txt_price = $('#txt_price' + id).val();

                var amount = (txt_qty * 1) * (txt_price * 1);

                var txt_subtotal = $('#txt_subtotal').val();

                txt_subtotal = parseFloat((txt_subtotal * 1) - (amount * 1)).toFixed(2); 
                $('#txt_subtotal').val(txt_subtotal);
                $('#sub_total').html('$' + txt_subtotal);

                var tax = parseFloat(txt_subtotal * 0.1).toFixed(2); 
                $('#tax').html('$' + tax);

                var total = parseFloat((txt_subtotal * 1.1)).toFixed(2); 
                $('#total').html('$' + total);
            }

            function QuickView(id)
            {
                $.ajax({
                    type:'POST',
                    url:'Modal/QuickView.php',
                    data:'id='+id,
                    success:function(msg){
                        
                        document.getElementById("quick_view").innerHTML = msg;
                        TotalCart('N');
                    }
                });
            }
            
        </script>

    </body>
</html>
