<?php
  
    if(!empty($_POST['id']) && !empty($_POST['email']) && !empty($_POST['qty'])){
        
        $id = $_POST['id'];
        $email = $_POST['email'];
        $qty = $_POST['qty'];
        
        $result = UpdateQTY($id, $email, $qty);
        if($result == 'Y'){echo 'OK';}
        else{ echo 'Fail';}
    }

    function UpdateQTY($id, $email, $qty)
    {
        $serverName = "(local)";
        $connectionOptions = [
            "Database" => "ecomdb",
            "Uid" => "sa",
            "PWD" => "212wsxzaq1",
            "CharacterSet" => "UTF-8"
            ];
        
        $conn = sqlsrv_connect($serverName, $connectionOptions);

        if($conn == false)
        {
            echo 'Connection Fail'; 
            die(print_r(sqlsrv_errows(),true));
        }

        
        $sql_sp = " Update  Order_List
                    Set     qty = ".$qty."
                    Where	email = '".$email."'
                            AND id = ".$id;
                                    
                            
        $result = sqlsrv_query( $conn, $sql_sp); 
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