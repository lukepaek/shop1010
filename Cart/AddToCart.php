<?php

    
    if(!empty($_POST['id']) && !empty($_POST['email']) && !empty($_POST['status_desc']) && !empty($_POST['qty'])){
            
        $id = $_POST['id'];
        $email = $_POST['email'];
        $status_desc = $_POST['status_desc'];
        $qty = $_POST['qty'];
        
        include('../connection/connection.php');

        $sql_sp = "{call sp_add_to_cart( ?, ?, ?, ? )}";  
        $params = array(   
                        array($id, SQLSRV_PARAM_IN),  
                        array($email, SQLSRV_PARAM_IN),
                        array($status_desc, SQLSRV_PARAM_IN),
                        array($qty, SQLSRV_PARAM_IN)    
                    ); 
        $result = sqlsrv_query( $conn, $sql_sp, $params); 
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        echo 'Y';

    }
?>