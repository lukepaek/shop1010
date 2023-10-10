<?php
    
    if(!empty($_POST['rg_email']) && !empty($_POST['rg_pwd']) && !empty($_POST['rg_name']) ){
            
        $rg_email = $_POST['rg_email'];
        $rg_pwd = $_POST['rg_pwd'];
        $rg_name = $_POST['rg_name'];
        
        include('../connection/connection.php');

        $sql_sp = "{call sp_register( ?, ?, ?)}";  
        $params = array(   
                        array($rg_email, SQLSRV_PARAM_IN),
                        array($rg_pwd, SQLSRV_PARAM_IN),
                        array($rg_name, SQLSRV_PARAM_IN)    
                    ); 
        $result = sqlsrv_query( $conn, $sql_sp, $params); 
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        
        $existing = 0;
        while($row = sqlsrv_fetch_array($result))
        {
            $existing = $row['existing'];
        }

        if($existing==0){
            session_start();
            $_SESSION['LoginAs'] = $rg_email;
        }
        
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        echo $existing;

    }
?>