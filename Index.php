
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
    <body onload="LoadingCart('Y')">             
        <?php 
            session_start(); 
            $_SESSION['page'] = '';
            if($_GET['id']==''){
                $_SESSION['page'] = 'Index';
            }

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
            elseif($_GET['id']=='WatchList')
            {
                include 'WatchList/WatchList.php';
            }
            elseif($_GET['id']=='SignUp')
            {
                include 'account/SignUp.php';
            }
            elseif($_GET['id']=='CartList')
            {
                include 'Cart/CartTable.php';
            }
            include 'footer.php';
        ?>

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

    </body>
</html>

