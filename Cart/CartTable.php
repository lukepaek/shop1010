<?php

    if(!empty($_POST['email']))
    {
        $email = $_POST['email'];
        include('../connection/connection.php');
        $sql =  "
                    SELECT	lt.id,
                            lt.email,
                            lt.product_id,
                            lt.qty,
                            lt.price,
                            lt.qty * lt.price Amount,
                            lt.created_date,
                            pl.product_desc1,
                            pl.product_desc2,
                            pl.image_url
                    FROM	Order_List lt
                            LEFT JOIN v_product_list pl ON lt.product_id = pl.id
                    WHERE	lt.email = '".$email."'
                        AND lt.status_desc = 'Cart'
                ";

        $result = sqlsrv_query( $conn, $sql);  
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }

        $msg = $header = $body = $footer = '';
        $il_row = 0;

        while($row = sqlsrv_fetch_array($result))
        {
            $il_row = $il_row + 1;
            if($il_row == 1)
            {
                $header = '</br>
                <div class="py-3 bg-gray-100">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-6 my-2"><h1 class="m-0 h4 text-center text-lg-start">Shopping Cart</h1></div>
                            <div class="col-6 my-2">
                                <ol class="breadcrumb dark-link m-0 small justify-content-center justify-content-lg-end">
                                    <li class="breadcrumb-item">
                                        <a class="text-nowrap"><i class="bi bi-home"></i>Home</a>
                                    </li>
                                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Shopping Cart</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="py-6">
                    <div class="container">
                        <div class="table-content table-responsive cart-table-content">
                            <table class="table table-bordered align-middle">
                                <thead>
                                    <tr class="text-uppercase text-nowrap">
                                        <th style="width: 80px;" class="text-mode text-center fw-500">Image</th>
                                        <th class="text-mode fw-500">Product Name</th>
                                        <th style="width: 120px;" class="text-mode text-center fw-500">Price</th>
                                        <th style="width: 120px;" class="text-mode text-center fw-500">Qty</th>
                                        <th style="width: 160px;" class="text-mode text-center fw-500">Amount</th>
                                        <th style="width: 120px;" class="text-mode text-center fw-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody>';
            }

            $body = $body.          '<tr>
                                        <td class="text-center product-thumbnail">
                                            <a class="text-reset" href="#">
                                                <img src="'.$row['image_url'].'" height="50" style="width:auto;  text-align:center;" alt="">
                                            </a>
                                        </td>
                                        <td class="text-left product-name">
                                            <a class="text-reset" href="#">'.$row['product_desc1'].$row['product_desc2'].'</a>
                                        </td>
                                        <td class="text-end product-price-cart"><span class="amount">$'.number_format($row['price'],2).'</span></td>
                                        <td class="text-end product-quantity">
                                            <div class="cart-qty d-inline-flex">
                                                <div class="dec qty-btn" id="'.$row['id'].'" onclick="CartsTableMinus(this.id)">-</div>
                                                <input class="cart-qty-input form-control" type="text" value="'.$row['qty'].'" id="txt_cqty_'.$row['id'].'" readonly>
                                                <div class="inc qty-btn" id="'.$row['id'].'" onclick="CartsTablePlus(this.id)">+</div>
                                            </div>
                                        </td>
                                        <td class="text-end product-subtotal">$'.number_format($row['Amount'],2).'</td>
                                        <td class="product-remove text-center text-nowrap">
                                            <a href="#" class="btn btn-sm btn-outline-danger text-nowrap px-3"><i class="bi bi-x lh-1"></i> <span class="d-none d-md-inline-block">Remove</span></a>
                                        </td>
                                    </tr>';
        }

        if($il_row > 0)
        {
            $footer =       '</tbody>
                        </table>
                    </div>
                    
                    <div class="row flex-row-reverse pt-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header bg-transparent py-3"><h6 class="m-0 mb-1">Order Total</h6></div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between align-items-center mb-2"><h6 class="me-2 text-body">Subtotal</h6><span class="text-end">$265.00</span></li>
                                        <li class="d-flex justify-content-between align-items-center mb-2"><h6 class="me-2 text-body">Taxes</h6><span class="text-end">$265.00</span></li>
                                        <li class="d-flex justify-content-between align-items-center border-top pt-3 mt-3"><h6 class="me-2">Grand Total</h6><span class="text-end text-mode">$265.00</span></li>
                                    </ul>
                                    <div class="d-grid gap-2 mx-auto"><a class="btn btn-primary" href="https://www.pxdraft.com/wrap/shopapp/html/account/checkout-shipping.html">PROCEED TO CHECKOUT</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        $msg = $header.$body.$footer;
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);
        echo  $msg ;
    }
?>




                    
               