<?php

    
    if(!empty($_POST['id']))
    {
        session_start();
        $serverName = $_SESSION['serverName'];
        $Database = $_SESSION['database'];
        $uid = $_SESSION['uid'];
        $pwd = $_SESSION['pwd'];
        $connectionOptions = [
            "Database" => $Database,
            "Uid" => $uid,
            "PWD" => $pwd,
            "CharacterSet" => "UTF-8"
            ];
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
        {
            echo 'Connection Fail'; 
            die(print_r(sqlsrv_errows(),true));
        } 
     
        $id = $_POST['id'];
        $sql = "
                SELECT	id,
                        country,
                        category,
                        brand,
                        product_status,
                        product_desc,
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

        while($row = sqlsrv_fetch_array($result))
        {
            $msg = '<div class="row">
                        <div class="col-lg-6 lightbox-gallery product-gallery">
                            <img src="'.$row['image_url'].'" class="img-fluid" title="" alt="">
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="product-detail pt-4">
                                <div class="products-brand pb-2"><span>'.$row['brand'].'</span></div>
                                <div class="products-title mb-2"><h1 class="h4">'.$row['product_desc'].'</h1></div>
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
                                    <label class="fs-6 text-mode pb-2 fw-500">Size</label>
                                    <div class="nav-thumbs nav mb-3">
                                        <div class="form-check radio-text form-check-inline me-2">
                                            <input class="form-check-input" type="radio" name="size3" id="xs2" checked=""> 
                                            <label class="radio-text-label" for="xs2">XS</label>
                                        </div>
                                        <div class="form-check radio-text form-check-inline me-2">
                                            <input class="form-check-input" type="radio" name="size3" id="s2">
                                            <label class="radio-text-label" for="s2">S</label>
                                        </div>
                                        <div class="form-check radio-text form-check-inline me-2">
                                            <input class="form-check-input" type="radio" name="size3" id="m2"> 
                                            <label class="radio-text-label" for="m2">M</label>
                                        </div>
                                        <div class="form-check radio-text form-check-inline me-2">
                                            <input class="form-check-input" type="radio" name="size3" id="l2"> 
                                            <label class="radio-text-label" for="l2">L</label>
                                        </div>
                                    </div>
                    
                                    <label class="fs-6 text-mode pb-2 fw-500">Color</label>
                                    <div class="nav-thumbs nav mb-3">
                                        <div class="form-check radio-color large form-check-inline me-2">
                                        <input class="form-check-input" type="radio" name="color1" id="color1" checked=""> 
                                        <label class="radio-color-label" for="color1"><span style="background-color: #126532;"></span></label>
                                        </div>
                                        <div class="form-check radio-color large form-check-inline me-2">
                                        <input class="form-check-input" type="radio" name="color1" id="color2"> 
                                        <label class="radio-color-label" for="color2"><span style="background-color: #ff9922;"></span></label>
                                        </div>
                                        <div class="form-check radio-color large form-check-inline me-2">
                                        <input class="form-check-input" type="radio" name="color1" id="color3"> 
                                        <label class="radio-color-label" for="color3"><span style="background-color: #326598;"></span></label>
                                        </div>
                                        <div class="form-check radio-color large form-check-inline me-2">
                                        <input class="form-check-input" type="radio" name="color1" id="color4"> 
                                        <label class="radio-color-label" for="color4"><span style="background-color: #126578;"></span></label>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="product-price fs-3 fw-500 mb-2">
                                        <!--<del class="text-muted fs-6">$38.<small>50</small></del>-->
                                        <span class="text-primary">$'.$row['price'].'</span>
                                    </div>
                                    <div class="product-detail-actions d-flex flex-wrap pt-3">
                                        <div class="cart-qty me-3 mb-3">
                                            <div class="dec qty-btn" OnClick="QuickView_QTY("-")">-</div>
                                            <input class="cart-qty-input form-control" type="text" name="qtybutton" id="txt_quickview_qty" value="1">
                                            <div class="inc qty-btn" OnClick="QuickView_QTY("+")">+</div>
                                        </div>
                                    <div class="cart-button mb-3 d-flex">
                                        <button class="btn btn-mode me-3" id="'.$row['id'].'" onclick="AddToCart(this.id)"><i class="fa fa-shopping-cart"></i> Add to cart</button> 
                                        <button class="btn btn-outline-primary me-3"><i class="fa fa-heart-o"></i></button>
                                        <button class="btn btn-outline-primary"><i class="fa fa-repeat"></i></button>
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

