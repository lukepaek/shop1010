<?php
    $serverName = "cubelane.cafe24.com";
    $connectionOptions = [
        "Database" => "shareoffice",
        "Uid" => "shareoffice",
        "PWD" => "officeshare"
        ];
    
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if($conn == false)
        die(print_r(sqlsrv_errows(),true));
//   else echo 'Connection Success'; 
?>