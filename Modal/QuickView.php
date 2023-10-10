<?php

    
    if(!empty($_POST['id']))
    {
        include('../connection/connection.php');
     
        $id = $_POST['id'];
        $sql = "
                SELECT	id,
                        country,
                        country_flag,
                        category,
                        brand,
                        product_status,
                        product_desc1,
                        product_detail,
                        price,
                        image_url,
                        url 
                FROM	v_product_list
                WHERE   id=".$id;
        
        
        $result = sqlsrv_query( $conn, $sql);  
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }

        $Products = "N";
        $msg = '';
        $url = '';
        $addtocart = "'Cart'";
        $WatchList = "'WatchList'";

        while($row = sqlsrv_fetch_array($result))
        {
            $url = "'".$row['url']."'";
            $msg = '<div class="row">
                        <div class="col-lg-6 lightbox-gallery product-gallery">
                        <a href="'.$row['url'].'" target=blank><img src="'.$row['image_url'].'" class="img-fluid" title="" alt=""></a>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="product-detail pt-4">
                                <div class="products-brand pb-2"><span>'.$row['brand'].'</span></div>
                                <a href="'.$row['url'].'" target=blank><div class="products-title mb-2"><h1 class="h4">'.$row['product_desc1'].'</h1></div></a>
                                <div class="rating-star text small pb-4">
                                    <i class="bi bi-star-fill active"></i> 
                                    <i class="bi bi-star-fill active"></i> 
                                    <i class="bi bi-star-fill active"></i> 
                                    <i class="bi bi-star-fill active"></i> 
                                    <i class="bi bi-star"></i> <small>(4 Reviews )</small>
                                </div>
                                <div class="product-description">
                                    <p>'.$row['product_detail'].'</p>
                                </div>
                                <div class="product-attribute">
                                    <div class="nav-thumbs nav mb-3">
                                        <table>
                                            <tr><td colspan="2">Product From</td><td></td></tr>
                                            <tr>
                                                <td><div class="product-meta small"><img src="'.$row['country_flag'].'" title="" alt="" width="20"></div></td>
                                                <td>'.$row['country'].'</td>
                                            </tr>
                                        </table>
                                    </div>
                    
                                   
                                    </div>
                                        <div class="product-price fs-3 fw-500 mb-2">
                                        <!--<del class="text-muted fs-6">$38.<small>50</small></del>-->
                                        <span class="text-primary">$'.$row['price'].'</span>
                                    </div>
                                    <div class="product-detail-actions d-flex flex-wrap pt-3">
                                    <div class="cart-button mb-3 d-flex">
                                        <button class="btn btn-mode me-3" id="'.$row['id'].'" onclick="AddToCart(this.id,'.$addtocart.',1,1)"><i class="fa fa-shopping-cart"></i> Add to cart</button> 
                                        <button class="btn btn-outline-primary me-3" id="'.$row['id'].'" onclick="AddToCart(this.id,'.$WatchList.',1,1)"><i class="fa fa-heart-o"></i></button>
                                        <button class="btn btn-outline-primary" onclick="DetailItem('.$url.')"><i class="fa fa-repeat"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }

        sqlsrv_free_stmt($result);
        sqlsrv_close( $conn);
        echo $msg;
    }
?>

