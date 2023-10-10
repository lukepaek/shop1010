<?php
    
    if(!empty($_POST['email']) && !empty($_POST['ip'])){
            
        $email = $_POST['email'];
        $ip = $_POST['ip'];
        include('../connection/connection.php');

        $sql_sp = "{call sp_updatecarts( ?, ?)}";  
        $params = array(   
                        array($email, SQLSRV_PARAM_IN),
                        array($ip, SQLSRV_PARAM_IN)    
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