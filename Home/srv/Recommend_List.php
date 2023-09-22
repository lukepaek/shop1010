<?php
    function RecommendList()
    {
        include('connection/connection.php');

        $sql = "
                    SELECT	id,
                            RowNo_Status rowno,
                            category,
                            country,
                            Product_desc1,
                            product_status,
                            price,
                            image_url,
                            url
                    FROM	v_product_list
                    WHERE	RowNo_Status < 50
                            AND product_status = 'RECOMMENDED'
                    ORDER	BY rowno
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
            $il_row = $il_row + 1;
            if($il_row == 1){OpenRecomment();}
            
            Echo '
                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" role="group" aria-label="'.$il_row.' / 7" style="width: 196px; margin-right: 24px;">
                    <div class="product-card-8">
                        <div class="product-card-image">
                            <div class="badge-ribbon"><span class="badge bg-danger">Sale</span></div>
                            <div class="product-action">
                                <a class="btn btn-outline-primary"><i class="fa fa-heart-o"></i> </a>
                                <a class="btn btn-outline-primary"><i class="fa fa-repeat"></i> </a>
                                <a data-bs-toggle="modal" data-bs-target="#px-quick-view" class="btn btn-outline-primary" id="'.$row['id'].'" OnClick="QuickView(id)"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="product-media">
                                <a href="'.$row['url'].'"><img src="'.$row['image_url'].'" height="220" Style="padding:20px; max-width: 100%;" title="" alt=""></a>
                            </div>
                        </div>
                        <div class="product-card-info">
                            <div class="rating-star text">
                                <i class="bi bi-star-fill active"></i> 
                                <i class="bi bi-star-fill active"></i> 
                                <i class="bi bi-star-fill active"></i> 
                                <i class="bi bi-star-fill active"></i> 
                                <i class="bi bi-star"></i>
                            </div>
                            <h6 class="product-title"><a href="'.$row['url'].'">'.$row['Product_desc1'].'</a></h6>
                            <div class="product-price">
                                <span class="text-primary">$'.$row['price'].'</span> 
                                <!--<del class="fs-sm text-muted">$38.<small>50</small></del>-->
                            </div>
                            <div class="product-cart-btn">
                                <a class="btn btn-primary btn-sm w-100" id="'.$row['id'].'" onclick="AddToCart(this.id)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>';
            $Products = "Y";
        }

        if($il_row > 0){CloseRecomment();}

        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        return  $Products;
    }

    function OpenRecomment()
    {
        Echo '<div class="container">
                <div class="section-heading section-heading-01">
                    <div class="row align-items-center">
                        <div class="col-auto col-md-6"><h3 class="h4 mb-0">Recomment Products</h3></div>
                        <div class="col-auto col-md-6 text-end">
                            <a href="https://www.pxdraft.com/wrap/shopapp/html/home/index-08.html#">View All <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-hover-arrow position-relative">
                    <div class="swiper swiper-container swiper-initialized swiper-horizontal swiper-pointer-events" data-swiper-options="{
                            &quot;slidesPerView&quot;: 2,
                            &quot;spaceBetween&quot;: 24,
                            &quot;loop&quot;: true,
                            &quot;pagination&quot;: {
                            &quot;el&quot;: &quot;.swiper-pagination&quot;,
                            &quot;clickable&quot;: true
                            },
                            &quot;navigation&quot;: {
                            &quot;nextEl&quot;: &quot;.swiper-next-02&quot;,
                            &quot;prevEl&quot;: &quot;.swiper-prev-02&quot;
                            },
                            &quot;autoplay&quot;: {
                            &quot;delay&quot;: 3500,
                            &quot;disableOnInteraction&quot;: false
                            },
                            &quot;breakpoints&quot;: {
                            &quot;600&quot;: {
                                &quot;slidesPerView&quot;: 3
                            },
                            &quot;991&quot;: {
                                &quot;slidesPerView&quot;: 4
                            },
                            &quot;1200&quot;: {
                                &quot;slidesPerView&quot;: 6
                            }
                            }
                    }">
                        <div class="swiper-wrapper" id="swiper-wrapper-57ce93a242d66e64" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-1540px, 0px, 0px);">
                    ';
    }

    function CloseRecomment()
    {
        Echo '     
                    <div class="swiper-pagination mt-4 d-lg-none position-relative swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                        <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2" aria-current="true"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 7"></span>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>

                </div>

                <div class="swiper-arrow-style-02 swiper-next swiper-next-02" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-57ce93a242d66e64">
                    <i class="bi bi-chevron-right"></i>
                </div>

                <div class="swiper-arrow-style-02 swiper-prev swiper-prev-02" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-57ce93a242d66e64">
                    <i class="bi bi-chevron-left"></i>
                </div>
            </div>
        </div>
    </div>';
        
    }
?>