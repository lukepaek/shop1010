
<?php
     if(!empty($_POST['pageno']) && !empty($_POST['country']))
     {
        include('../connection/connection.php');

        $pageno = $_POST['pageno'];
        $country = $_POST['country'];
        $search = $_POST['search'];
        $status_desc = $_POST['search'];

        $sql = "
                    SELECT	id,
                            rowno,
                            category,
                            country_flag,
                            Product_desc1,
                            product_status,
                            price,
                            image_url,
                            url,
                            Total_Items,
                            Total_Items_List
                    FROM	v_product_list ls,
                            (
                                SELECT	CASE WHEN ROUND(CONVERT(FLOAT,COUNT(*))/30,0) > CONVERT(FLOAT,COUNT(*))/30 THEN 
                                            ROUND(CONVERT(FLOAT,COUNT(*))/30,0)
                                        ELSE
                                            ROUND(CONVERT(FLOAT,COUNT(*))/30,0) + 1
                                        END Total_Items,
                                        COUNT(*) Total_Items_List
                                FROM	v_product_list
                                WHERE	product_status = 'RECOMMENDED'
                                        AND CASE WHEN '".$country."' = 'ALL' THEN 'ALL' ELSE country END = '".$country."' 
                                        AND CASE WHEN '".$search."' = '' THEN '' ELSE product_detail END Like '%".$search."%'
                            )tl    
                    WHERE	product_status = 'RECOMMENDED'
                            AND rowno BETWEEN (".$pageno." * 30) - 30 AND (".$pageno." * 30)
                            AND CASE WHEN '".$country."' = 'ALL' THEN 'ALL' ELSE country END = '".$country."' 
                            AND CASE WHEN '".$search."' = '' THEN '' ELSE product_detail END Like '%".$search."%'
                    ORDER	BY	rowno
                "; 
        
        $result = sqlsrv_query( $conn, $sql);  
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        $il_row = 0;
        $Total_Items = 0;
        $Total_Items_List = 0;
        $ItemsPage = '';
        $header = '';
        $body = '';
        $footer = '';
        $msg = '';
        
        $AddCart = "'Cart'";
        $WatchList = "'WatchList'";
        $url = '';
        while($row = sqlsrv_fetch_array($result))
        {
            $il_row = $il_row  + 1;
            $url = "'".$row['url']."'";
            if ($il_row == 1)
            {
                $Total_Items = $row['Total_Items'];
                $Total_Items_List = $row['Total_Items_List'];
                $header = '</br></br>
                    <section class="section pt-0" >
                        <div class="container">
                            <div class="section-heading section-heading-01">
                                <div class="row align-items-center">
                                    <div class="col-auto col-md-6"><h3 class="h4 mb-0">Recommended Products</h3></div>
                                    <div class="col-auto col-md-6 text-end">
                                        <a href="#">View All <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-content" id="home-6_tabsContent">
                                <!-- Tab pane -->
                                <div class="tab-pane fade active show" id="h6_tab_1" role="tabpanel" aria-labelledby="h3_tabnav_1">
                                    <div class="row g-3 g-lg-4">';
            }
            
                $body = $body.'<div class="col-6 col-lg-2">
                                            <div class="product-card-1">
                                                <div class="product-card-image">
                                                    <div class="badge-ribbon"><span class="badge bg-danger">Sale</span></div>
                                                    <div class="product-action">
                                                        <a href="#" class="btn btn-outline-primary" id="'.$row['id'].'" onclick="AddToCart(this.id,'.$WatchList.',1,1)"><i class="fa fa-heart-o"></i> </a>
                                                        <a href="#" class="btn btn-outline-primary" onclick="DetailItem('.$url.')"><i class="fa fa-repeat"></i> </a>
                                                        <a data-bs-toggle="modal" data-bs-target="#px-quick-view" href="javascript:void(0)" class="btn btn-outline-primary" id="'.$row['id'].'" OnClick="QuickView(id)"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                    <div class="product-media">
                                                        <div class="align-items-center">
                                                            <a href="#"><img src="'.$row['image_url'].'" title="" alt="" height="220" style="padding:15px; width:auto;  text-align:center;"></a>
                                                        </div>
                                                        <div class="product-cart-btn">
                                                            <a class="btn btn-primary btn-sm w-100" id="'.$row['id'].'" onclick="AddToCart(this.id,'.$AddCart.',1,1)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card-info">
                                                    <div class="product-meta small"><img src="'.$row['country_flag'].'" title="" alt="" width="20"></div>
                                                    <div class="rating-star text">
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star"></i>
                                                    </div>
                                                    <h6 class="product-title"><a href="#">'.$row['Product_desc1'].'</a></h6>
                                                    <div class="product-price">
                                                        <span class="text-primary">$'.$row['price'].'</span> 
                                                        <!--<del class="fs-sm text-muted">$38.<small>50</small></del>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
        }

        $PageHeader = '';
        $PageBody = '';
        $PageFooter = '';
        $Pagemsg = '';

        if($il_row > 0)
        {
            $il_row = 0;
            while($il_row < $Total_Items)
            {
                $il_row = $il_row + 1;
                if($il_row == 1)
                {
                    $PageHeader =  '<div class="shop-bottom-bar d-flex align-items-center pt-3 mt-3">
                                        <div class="ms-auto">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                </li>';
                }
                
                if($pageno == $il_row)
                {
                    $PageBody = $PageBody.'<li class="page-item active"><a class="page-link" href="#" id="'.$il_row.'" onclick="ItemsPage(this.id)">'.$il_row.'</a></li>';      
                }
                else
                {
                    $PageBody = $PageBody.'<li class="page-item"><a class="page-link" href="#" id="'.$il_row.'" onclick="ItemsPage(this.id)">'.$il_row.'</a></li>';
                }

            }

            if($il_row > 0)
            {
                $PageFooter =                   '<li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                            </ul>
                                        </div>
                                    </div>';
            }

            $Pagemsg = $PageHeader.$PageBody.$PageFooter;
            $footer =               '</div>
                                </div>
                            </div>
                            '.$Pagemsg.'
                            <!--
                            <div class="shop-bottom-bar d-flex align-items-center pt-3 mt-3">
                                <div>Total Products: 1 - 12 of 17</div>
                                <div class="ms-auto">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#" id="1">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#" id="2">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#" id="3">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </div>
                            </div>-->
                        </div>
                    </section>';

            $msg = $header.$body.$footer;
        }

        session_start();
        $_SESSION['country'] = $country;

        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);
        echo  $msg ;
    }

?>