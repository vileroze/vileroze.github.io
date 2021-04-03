<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db";

    $connection = mysqli_connect($hostname, $username, $password, $dbname);
    if ($connection) {
    } else
    echo "Connection failure";
?>
