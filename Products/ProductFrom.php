<?php    
    if(!empty($_POST['Country']))
    {
        include('../connection/connection.php');
        
        $country = $_POST['Country'];

        $sql = "Select  CASE WHEN country = '".$country."' THEN 0 ELSE RowNo END RowNo, 
                        country, 
                        country_flag 
                From    v_product_country 
                Order By RowNo";   

        $result = sqlsrv_query( $conn, $sql); 
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        
        $success = 'N';
        $il_row = 0;
        $header = '';
        $body = '';
        $footer = '';
        $msg = '';
        while($row = sqlsrv_fetch_array($result))
        {
            $il_row = $il_row + 1;
            if($il_row == 1)
            {
                
                $header =  '<a class="dropdown-toggle text-black" href="#" role="button" id="dropdown_language" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="me-2" width="20" src="'.$row['country_flag'].'" alt=""> '.$row['country'].'
                            </a>
                            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdown_language" style="margin: 0px;">';
            }
            $body = $body. '<a class="dropdown-item" href="#" id="'.$row['country'].'" onclick="SelectCountry(this.id)"><img class="me-2" width="20" src="'.$row['country_flag'].'" alt="">'.$row['country'].' </a>'; 
            $success = 'Y';
        }

        if($il_row > 0){
            $footer = '</div>';
            $msg = $header.$body.$footer;
        }
        $success = 'Y';
        
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);
        echo $msg;
    }
?>