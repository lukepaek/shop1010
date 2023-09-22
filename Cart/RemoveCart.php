<?php

    if(!empty($_POST['id']) && !empty($_POST['email'])){
            
        $id = $_POST['id'];
        $email = $_POST['email'];
        
        $result = RemoveCart($id, $email);
        echo $result;
    }

    function RemoveCart($id, $email)
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

        $sql = "Delete From	Order_List Where email = '".$email."' And id = ".$id." And status_desc = 'Cart'";       
        $result = sqlsrv_query( $conn, $sql); 
        if( $result == false )  
        {  
            echo "Error in executing statement"."</br>";  
            die( print_r( sqlsrv_errors(), true));  
        }
        
        $success = 'Y';
        sqlsrv_free_stmt( $result);
        sqlsrv_close( $conn);

        return $success;

    }
?>