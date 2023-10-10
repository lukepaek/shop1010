<?php

    if(!empty($_POST['ip'])){
        session_start();
        $_SESSION['LoginAs'] = $_POST['ip'];
        echo 'Y';
    }
?>