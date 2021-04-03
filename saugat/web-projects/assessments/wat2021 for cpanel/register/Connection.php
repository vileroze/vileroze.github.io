<?php
    $hostname="localhost";
    $username="saugatth_root";
    $password="admin";
    $dbname  ="saugatth_for_prac";

    $connection = mysqli_connect($hostname, $username, $password, $dbname);
    if ($connection) {
    } else
    echo "Connection failure";
?>
