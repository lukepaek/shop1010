<?php
    if(!empty($_POST['email']) && !empty($_POST['id']))
    {
        $email = $_POST['email'];
        $id = $_POST['id'];

        include('../connection/connection.php');
        $sql =  "
                    UPDATE	Order_List 
                    SET		status_desc = 'Cart'
                    WHERE	email = '".$email."' 
                            AND Id = ".$id." 
                            AND status_desc = 'WatchList'
                ";

        $result = sqlsrv_query( $conn, $sql);  
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);
        echo  'Y' ;
    }
?>

                    
                    
                