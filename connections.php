<?php
    $serverName = "hanel2020.cafe24.com";
    $connectionOptions = [
        "Database" => "ecomdb",
        "Uid" => "sa",
        "PWD" => "212wsxzaq1"
        ];
    
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if($conn == false)
        die(print_r(sqlsrv_errows(),true));
//   else echo 'Connection Success'; 
?>