<?php
     session_start();
     if($_POST['Remove']=='Y')
     {
          $_SESSION['cartqty'] = $_SESSION['cartqty'] - 1;
     }

     Echo $_SESSION['cartqty'];
?>