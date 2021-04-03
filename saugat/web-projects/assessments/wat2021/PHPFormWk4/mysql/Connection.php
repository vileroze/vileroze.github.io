<?php
    session_start();
    $hostname="localhost";
    $username="root";
    $password="";
    $dbname  ="db";

    $connection= mysqli_connect($hostname,$username,$password,$dbname);
    if($connection){
    echo "<br/>";
	}else{
        echo "<br/> Connection failure!!";
    }
?>
