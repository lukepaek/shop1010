<?php
        
    function LoadingCheckOut($email)
    {
        include('connection/connection.php');
        $sql = "
                SELECT	lt.id,
                        lt.product_id,
                        pl.product_desc,
                        pl.image_url,
                        pl.url,
                        lt.price,
                        lt.qty * lt.price amount,
                        tl.Sut_Total,
                        tl.Sut_Total * 0.1 Tax,
                        tl.Sut_Total * 1.1 Total_Order 
                FROM	Order_List lt
                        LEFT JOIN v_product_list pl ON pl.id = lt.product_id
                        LEFT JOIN
                        (
                            SELECT	SUM(qty * price) Sut_Total
                            FROM	Order_List
                            WHERE	email = '".$email."' AND status_desc = 'Cart'
                        )tl ON tl.Sut_Total > 0
                WHERE	email = '".$email."'
                        AND lt.status_desc = 'Cart'";


        $result = sqlsrv_query( $conn, $sql);  
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }

        $Products = "N";
        $il_row = 0;
        $Total_Order = 0;
        $Sub_Total = 0;
        $Tax = 0;
        $Total_Order = 0;

        while($row = sqlsrv_fetch_array($result))
        {
            $il_row = $il_row + 1;
            if($il_row == 1){Echo '<ul class="list-unstyled m-0 p-0">';}
            
            Echo '<li class="pb-3 mb-3 border-bottom">
                        <div class="row align-items-center">
                            <div class="col-4 col-md-2 col-lg-2">
                                <a href="'.$row['url'].'"><img src="'.$row['image_url'].'" height="80" alt="..."></a>
                            </div>
                            <div class="col-8">
                                <p class="mb-1">
                                    <a class="text-mode fw-500" href="'.$row['url'].'">'.$row['product_desc'].'</a> 
                                    <span class="m-0 text-muted w-100 d-block">$'.$row['price'].'</span>
                                </p>
                                <a class="small link-danger ms-auto" href="#"><i class="bi bi-x"></i> Remove</a>
                            </div>
                        </div>
                    </li>';
            
            $Products = "Y";

            $Sub_Total = number_format($row['Sut_Total'],2);
            $Tax = number_format($row['Tax'],2);
            $Total_Order = number_format($row['Total_Order'],2);
        }

        if($il_row > 0)
        {
            Echo   '</ul>
                    <ul class="list-unstyled m-0">
                        <li class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="me-2 text-body">Subtotal</h6>
                            <span class="text-end">$'.$Sub_Total.'</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="me-2 text-body">Taxes</h6>
                            <span class="text-end">$'.$Tax.'</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center border-top pt-3 mt-3">
                            <h6 class="me-2">Grand Total</h6>
                            <span class="text-end text-mode">$'.$Total_Order.'</span>
                        </li>
                    </ul>';
        }


        sqlsrv_free_stmt($result);
        sqlsrv_close( $conn);
       
    }
?>