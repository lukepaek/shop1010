<?php

    if(!empty($_POST['id']) && !empty($_POST['email'])){
            
        $id = $_POST['id'];
        $email = $_POST['email'];
        
        $result = RemoveCart($id, $email);
        echo $result;
    }

    function RemoveCart($id, $email)
    {
        include('../connection/connection.php');

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