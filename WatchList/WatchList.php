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
                        AND lt.status_desc = 'WatchList'
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
                            <div class="col-lg-6 my-2"><h1 class="m-0 h4 text-center text-lg-start">Wishlist</h1></div>
                            <div class="col-lg-6 my-2">
                                <ol class="breadcrumb dark-link m-0 small justify-content-center justify-content-lg-end">
                                    <li class="breadcrumb-item">
                                        <a class="text-nowrap"><i class="bi bi-home"></i>Home</a>
                                    </li>
                                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Wishlist</li>
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
                                        <th style="width: 120px;" class="text-mode text-center fw-500">Amount</th>
                                        <th style="width: 200px;" class="text-mode text-center fw-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody>';
            }
            $body = $body.     '<tr id="w_tr_'.$row['id'].'">
                                    <td class="product-thumbnail">
                                        <a class="text-reset" href="#"><img src="'.$row['image_url'].'" height="50" style="width:auto;  text-align:center;" alt=""></a>
                                    </td>
                                    <td class="product-name">
                                        <a class="text-reset" href="#">'.$row['product_desc1'].$row['product_desc2'].'</a>
                                    </td>
                                    <td class="product-price-cart text-end"><span class="amount">$'.$row['price'].'</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-qty d-inline-flex">
                                            <div class="dec qty-btn" id="'.$row['id'].'" onclick="WatchMinus(this.id)">-</div>
                                            <input class="cart-qty-input form-control" type="text" id="txt_wqty_'.$row['id'].'" value="'.$row['qty'].'" readonly>
                                            <div class="inc qty-btn" id="'.$row['id'].'" onclick="WatchPlus(this.id)">+</div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal text-end">$'.$row['Amount'].'</td>
                                    <td class="product-remove text-end text-nowrap">
                                        <a class="btn btn-sm btn-outline-dark text-nowrap px-3" id="'.$row['id'].'" onclick="WatchRemove(this.id)"><i class="bi bi-x lh-1"></i></a> 
                                        <a class="btn btn-sm btn-outline-primary text-nowrap px-3" id="'.$row['id'].'" onclick="WatchtoCart(this.id)"><i class="fa fa-shopping-cart lh-1 me-md-1"></i> <span class="d-none d-md-inline-block">ADD TO CART</span></a>
                                    </td>
                                </tr>';
        }

        if($il_row > 0 )
        {
            $footer =       '</tbody>
                        </table>
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

                    
                    
                