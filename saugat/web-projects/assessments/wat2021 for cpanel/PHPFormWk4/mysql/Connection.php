<?php
    session_start();
    $hostname="localhost";
    $username="saugatth_root";
    $password="admin";
    $dbname  ="saugatth_for_prac";

    $connection= mysqli_connect($hostname,$username,$password,$dbname);
    if($connection){
    echo "<br/>";
	}else{
        echo "<br/> Connection failure!!";
    }
?>
