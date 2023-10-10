<?php
    session_start();

    $loginas = $_POST['LoginAs'];

    if(!empty($_SESSION['LoginAs']))
    {
        if (str_contains($loginas, '@')) {
            $_SESSION['LoginAs'] = $loginas;
        }
    }
    else
    {
        $_SESSION['LoginAs'] =  $loginas;
    }
    
    echo $_SESSION['LoginAs'] ;
?>