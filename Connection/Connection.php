
<?php
  
    $serverName = "hanel2020.cafe24.com";
    $Database = "ecomdb";
    $uid = "sa";
    $pwd = "212wsxzaq1";

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
  
?>