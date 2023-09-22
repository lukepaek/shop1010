
<?php
    function ItemsList()
    {
        include('connection/connection.php');

        $sql = "
                    SELECT	id,
                            rowno,
                            category,
                            country,
                            Product_desc1,
                            product_status,
                            price,
                            image_url,
                            url
                    FROM	v_product_list
                    WHERE	RowNo BETWEEN 
                                CASE WHEN 1 = 1 THEN 1
                                    WHEN 1 = 2 THEN 37
                                ELSE 73
                                END 
                                AND 
                                CASE WHEN 1 = 1 THEN 36
                                    WHEN 1 = 2 THEN 72
                                ELSE 107
                                END 
                    ORDER	BY	rowno
                "; 

        $result = sqlsrv_query( $conn, $sql);  
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }

        $Products = "N";
        $il_row = 0;
        while($row = sqlsrv_fetch_array($result))
        {
            $il_row = $il_row  + 1;
            if ($il_row == 1)
            {
                Echo '</br></br>
                    <section class="section pt-0">
                        <div class="container">
                            <div class="section-heading section-heading-01">
                                <div class="row align-items-center">
                                    <div class="col-auto col-md-6"><h3 class="h4 mb-0">Shop Now</h3></div>
                                    <div class="col-auto col-md-6 text-end">
                                        <a href="https://www.pxdraft.com/wrap/shopapp/html/home/index-08.html#">View All <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-content" id="home-6_tabsContent">
                                <!-- Tab pane -->
                                <div class="tab-pane fade active show" id="h6_tab_1" role="tabpanel" aria-labelledby="h3_tabnav_1">
                                    <div class="row g-3 g-lg-4">';
            }
            
                Echo                    '<div class="col-6 col-lg-2">
                                            <div class="product-card-1">
                                                <div class="product-card-image">
                                                    <div class="badge-ribbon"><span class="badge bg-danger">Sale</span></div>
                                                    <div class="product-action">
                                                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-heart-o"></i> </a>
                                                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-repeat"></i> </a>
                                                        <a data-bs-toggle="modal" data-bs-target="#px-quick-view" href="javascript:void(0)" class="btn btn-outline-primary" id="'.$row['id'].'" OnClick="QuickView(id)"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                    <div class="product-media">
                                                        <div class="box large">
                                                            <a href="#"><img src="'.$row['image_url'].'" title="" alt=""></a>
                                                        </div>
                                                        <div class="product-cart-btn">
                                                            <a class="btn btn-primary btn-sm w-100" id="'.$row['id'].'" onclick="AddToCart(this.id)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card-info">
                                                    <div class="product-meta small">
                                                        <a href="#">Clothing</a>, <a href="#">Men</a>
                                                    </div>
                                                    <div class="rating-star text">
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star-fill active"></i> 
                                                        <i class="bi bi-star"></i>
                                                    </div>
                                                    <h6 class="product-title"><a href="#">Fine-knit sweater</a></h6>
                                                    <div class="product-price">
                                                        <span class="text-primary">$28.<small>50</small></span> 
                                                        <del class="fs-sm text-muted">$38.<small>50</small></del>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';

            $Products = "Y";
        }

        if($il_row > 0)
        {
            Echo                   '</div>
                                </div>
                            </div><!-- Tab Pane -->

                            <div class="shop-bottom-bar d-flex align-items-center pt-3 mt-3">
                                <div>Showing: 1 - 12 of 17</div>
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
                            </div><!-- End Product Box -->
                        </div>
                    </section><!-- End Shop -->';  
        }

        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        return  $Products;
    }

?>
