
<?php
    function CartArray()
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
            $Products = 'Y';
        }

        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        return  $Products;
    }

?>
