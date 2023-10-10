<?php
    
    if(!empty($_POST['log_email']) && !empty($_POST['log_pwd'])){
            
        $log_email = $_POST['log_email'];
        $log_pwd = $_POST['log_pwd'];
        
        include('../connection/connection.php');

        $sql_sp = "
                    SELECT	COUNT(*) found
                    FROM	Register
                    WHERE	email = '".$log_email."'
                            AND password = '".$log_pwd."'";  

        $result = sqlsrv_query( $conn, $sql_sp); 
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        
        $found = 0;
        while($row = sqlsrv_fetch_array($result))
        {
            $found = $row['found'];
        }
        
        if($found==1){
            session_start();
            $_SESSION['LoginAs'] = $log_email;
        }
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);
        echo $found;

    }
?>