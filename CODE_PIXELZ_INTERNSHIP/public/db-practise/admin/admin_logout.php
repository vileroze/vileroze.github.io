<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../validate-customer/customer_login.php');
?>