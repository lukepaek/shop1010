
<header class="header-main fixed-top header-fluid bg-mode-re header-height header-option-10 fixed-header" style="top: 0px;"><!-- Top Header -->   
    <div class="header-middle">
        <div class="container">
            <div class="row justify-content-around align-items-center">

            <div class="col-md-4 col-lg-3 text-center text-md-start"><!-- Logo --> 
              <a class="navbar-brand" href="index.php">
                <img class="logo-dark" src="./Resources/img/logo.svg" title="" alt=""> 
              </a><!-- Logo -->
            </div>

            <div class="col-lg-6 d-lg-block collapse h-search header-right" id="header_06_search">
                <table>
                    <tr>
                    <td width="20%" style="text-align: left;">
                        <div class="dropdown ms-0 ms-lg-3">
                        <div style="font-size: smaller; text-align: left; margin-bottom:-7px;">Products From</div>
                        <div id="Select_Country"></div>
                        </div>
                    </td>
                    <td>&nbsp;</td>
                    <td width="80%">
                        <form>
                            <input class="form-control" type="text" name="search" placeholder="Products Search">
                            <button type="button" class="btn shadow-none"><i class="fa fa-search"></i></button>
                        </form>
                    </td>
                    </tr>
                </table>
            </div>
            
            
            <div class="col-md-6 col-lg-2 header-right">
                <div class="nav flex-nowrap align-items-center justify-content-md-end">
                <div class="nav-item d-lg-none">
                    <a class="nav-link" data-bs-toggle="collapse" href="#header_06_search" role="button" aria-expanded="false" aria-controls="header_06_search"><i class="fa fa-search"></i>
                    </a>
                </div><!-- Nav User-->
                
                <div class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" id="dropdown_myaccount" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"></i>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-end mt-2 shadow" aria-labelledby="dropdown_myaccount">
                    <a class="dropdown-item" href="#">Login</a> 
                    <a class="dropdown-item" href="index.php?id=SignUp">Register</a> 
                    <a class="dropdown-item" href="#">Wishlist</a> 
                    <a class="dropdown-item" href="index.php?id=Address">My account</a>
                    </div>
                </div><!-- Wishlist -->
                
                <div class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-heart-o"></i></a>
                </div><!-- Cart -->
                
                <div class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#modalMiniCart" role="button" aria-controls="modalMiniCart">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <a id = "cart_qty"></a>
                    
                </div>

                <div class="nav-item ms-auto ms-md-0 d-lg-none"><!-- Mobile Toggle --> 
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span></span>
                    </button><!-- End Mobile Toggle -->
                </div>
                </div>
            </div>
            </div>
        </div>

        
    </div><!-- End Top Header -->
    <?php //include 'header/CategoryHeader.php'; ?>
</header></br></br>

<script>
    function SelectCountry(country)
    {
        $.ajax({
            type:'POST',
            url:'Products/ProductFrom.php',
            data:'Country='+country,
            success:function(msg){
                document.getElementById("Select_Country").innerHTML = msg;
            }
        });
    }
  </script>