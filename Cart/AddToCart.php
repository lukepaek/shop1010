<?php

    
    if(!empty($_POST['id']) && !empty($_POST['email'])){
            
        $id = $_POST['id'];
        $email = $_POST['email'];
        
        $result = AddToCarts($id, $email);
        echo $result;
    }

    function AddToCarts($id, $email)
    {
        session_start();
        $serverName = $_SESSION['serverName'];
        $Database = $_SESSION['database'];
        $uid = $_SESSION['uid'];
        $pwd = $_SESSION['pwd'];
        $connectionOptions = [
            "Database" => $Database,
            "Uid" => $uid,
            "PWD" => $pwd,
            "CharacterSet" => "UTF-8"
            ];
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
        {
            echo 'Connection Fail'; 
            die(print_r(sqlsrv_errows(),true));
        } 
        

        $sql_sp = "{call sp_add_to_cart( ?, ? )}";  
        $params = array(   
                        array($id, SQLSRV_PARAM_IN),  
                        array($email, SQLSRV_PARAM_IN)  
                    ); 
        $result = sqlsrv_query( $conn, $sql_sp, $params); 
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        
        $success = 'N';
        while($row = sqlsrv_fetch_array($result))
        {
            $success = 'Y';
        }
        $success = 'Y';
        
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        return $success;

    }
?>