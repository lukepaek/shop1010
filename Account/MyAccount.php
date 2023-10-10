<?php
    if(!empty($_POST['email'])){
        $my_account = '';
        $loginas = $_POST['email'];
        if (str_contains($loginas, '@')) {
            $my_account =  '<div class="dropdown-menu dropdown-menu-end mt-2 shadow" aria-labelledby="dropdown_myaccount">
                                <a class="dropdown-item" href="index.php?id=Address">My account</a>
                                <a class="dropdown-item" OnClick="LogOut()" href="#">Log Out</a>
                            </div>';
        }
        else
        {
            $my_account =  '<div class="dropdown-menu dropdown-menu-end mt-2 shadow" aria-labelledby="dropdown_myaccount">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#topbarlogin" href="#">Login</a> 
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#topbarregister">Register</a>  
                            </div>';

        }
        Echo $my_account ;
    }
?>
