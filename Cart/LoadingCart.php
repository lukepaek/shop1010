
<?php
        session_start();
        $loginas = $_SESSION['LoginAs'];
        include('../connection/connection.php');
        $sql = "
                SELECT	lt.id,
                        lt.email,
                        lt.product_id,
                        lt.qty,
                        lt.price,
                        lt.qty * lt.price Amount,
                        lt.created_date,
                        pl.product_desc,
                        pl.image_url,
                        tl.Total_Item,
                        tl.Total_Order
                FROM	Order_List lt
                        LEFT JOIN v_product_list pl ON lt.product_id = pl.id
                        LEFT JOIN 
                        (
                            SELECT	COUNT(*) Total_Item, SUM(qty * price) Total_Order, email, status_desc
                            FROM	Order_List  
                            WHERE	email = '".$loginas."' 
                                    AND status_desc = 'Cart'
                            GROUP	BY email, status_desc
                        )tl ON tl.email = lt.email AND  tl.status_desc = tl.status_desc
                WHERE	lt.email = '".$loginas."'
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
        $Category = "'CartsMini'";

        while($row = sqlsrv_fetch_array($result))
        {
            $il_row = $il_row  + 1;

            if($il_row == 1)
            {
                $header ='<div class="offcanvas offcanvas-end" tabindex="-1" id="modalMiniCart" aria-labelledby="modalMiniCartLabel">
                            <div class="offcanvas-header border-bottom">
                                <h6 class="offcanvas-title" id="modalMiniCartLabel"><p id="total_cartqty">Your Cart ('.$row['Total_Item'].')</p></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="list-unstyled m-0 p-0">';
            }
            
            $body = $body.
                                    '<li class="py-2" id="li'.$row['product_id'].'">
                                        <div class="row align-items-center">
                                        <div class="col-4"><!-- Image --> 
                                            <a href="https://www.pxdraft.com/wrap/shopapp/html/home/index-10.html#"><img src="'.$row['image_url'].'" height="92" Style="padding:10px;" alt="..."></a>
                                        </div>
                                        <div class="col-8"><!-- Title -->
                                            <p class="mb-2">
                                            <a class="text-mode fw-500" href="https://www.pxdraft.com/wrap/shopapp/html/home/index-10.html#">'.$row['product_desc'].'</a> 
                                            <span class="m-0 text-muted w-100 d-block">$'.number_format($row['price'],2).'</span>
                                            <input type="hidden" id="txt_price'.$row['product_id'].'" value="'.number_format($row['price'],2).'">
                                            </p><!--Footer -->
                                            
                                            <div class="d-flex align-items-center"><!-- Select --> 
                                                
                                                <div class="cart-qty d-inline-flex">
                                                    <div class="dec qty-btn qty_btn"><a id='.$row['product_id'].' OnClick="CartMinus(this.id)">-</a></div>
                                                    <input readonly type="text" name="qtybutton" value="'.$row['qty'].'" size="12" style="text-align: center;" id="txt_qty'.$row['product_id'].'">
                                                    <div class="inc qty-btn qty_btn"><a id='.$row['product_id'].' OnClick="CartPlus(this.id)">+</a></div>
                                                </div>
                                    
                                                <button class="btn btn-link px-0 text-danger ms-auto" type="button" id="'.$row['product_id'].'" OnClick="RemoveCart(this.id,'.$Category.')"><i class="fa fa-trash-o"></i><span class=""> Remove</span></button>
                                            </div>
                                        </div>
                                        </div>
                                    </li>';                     
            $Products = "Y";

            $Total_Order = number_format($row['Total_Order'],2);
        }

        if($il_row > 0)
        {
            
            $Sub_Total = $Total_Order;
            $Tax = number_format($Sub_Total * 0.1,2);
            $Total_Order = number_format($Sub_Total + $Tax,2);

            $footer   =             '</ul>
                                </div>
                                
                                <div class="offcanvas-footer border-top p-3">
                                    <div class="row g-0 py-2">
                                        <div class="col-8"><span class="text-mode">Sub Total</span></div>
                                        <div class="col-4 text-end"><span class="ml-auto"><a id = "sub_total">$'.$Sub_Total.'</a></span></div>
                                        <input type="hidden" id="txt_subtotal" value="'.$Sub_Total.'">
                                    </div>
                                    
                                    <div class="row g-0 py-2">
                                        <div class="col-8"><span class="text-mode">Tax</span></div>
                                        <div class="col-4 text-end"><span class="ml-auto"><a id = "tax">$'.$Tax.'</a></span></div>
                                    </div>
                    
                                    <div class="row g-0 pt-2 mt-2 border-top fw-bold text-mode">
                                        <div class="col-8"><span class="text-mode">Total Order</span></div>
                                        <div class="col-4 text-end"><span class="ml-auto"><a id = "total">$'.$Total_Order.'</a></span></div>
                                    </div>

                                    <div class="pt-4">
                                        <table style="width:100%">
                                            <tr>
                                                <td><a class="btn btn-primary w-100" href="index.php?id=CheckOut">Check Out</a>
                                                <td>&nbsp;</td> 
                                                <td><a class="btn btn-block btn-outline-mode w-100" data-bs-dismiss="offcanvas" onclick="CartsTable()">View Cart</a>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>';
        }

        $msg = $header.$body.$footer;
        
       
        $_SESSION['cartqty'] = $il_row;
      
        sqlsrv_free_stmt($result);
        sqlsrv_close( $conn);
        
        echo $msg;

        
        //return  $Products;
    //}

?>
