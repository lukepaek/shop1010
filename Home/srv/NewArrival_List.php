
<?php
    function NewArrivalList()
    {
        include('connection/connection.php');

        $sql = "
                    SELECT	id,
                            RowNo_Category rowno,
                            category,
                            country,
                            Product_desc1,
                            product_status,
                            price,
                            image_url,
                            url
                    FROM	v_product_list
                    WHERE	category IN ('Home Tools', 'Kitchen Tools', 'Music Tools')
                            AND RowNo_Category < 5  
                    ORDER	BY category, rowno
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
                Echo '<section class="section">
                        <div class="container">
                            <div class="row g-4">';
            }
            
            if($row['rowno'] == 1) {

            Echo    '   <div class="col-lg-4">
                            <div class="sm-title-02 mb-4 d-flex">
                                <h5 class="m-0">'.$row['category'].'</h5>
                                <a class="text-primary fw-500 small text-uppercase ms-auto" href="#">View All</a>
                            </div>';
            }

            Echo            '<div class="product-card-4 rounded overflow-hidden">
                                <div class="product-card-image">
                                    <a href="#"><img src="'.$row['image_url'].'" height="120" Style="padding:10px;" title="" alt=""></a>
                                </div>
                                <div class="product-card-info">
                                    <h6 class="product-title"><a href="#" tabindex="0">Fine-knit sweater</a></h6>
                                    <div class="product-price">
                                        <span class="text-primary">$'.$row['price'].'</span> 
                                        <!--<del class="fs-sm text-muted">$38.<small>50</small></del>-->
                                    </div>
                                    <div class="produc-card-cart"><a class="link-effect" href="#">Buy Now</a></div>
                                </div>
                            </div>';

            if($row['rowno'] == 4)
            {
                Echo '</div>';
            }
            $Products = "Y";
        }

        if($il_row > 0)
        {
            Echo        '</div>
                    </div>
                </section>';  
        }

        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        return  $Products;
    }

?>
