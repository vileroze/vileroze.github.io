<?php
session_start();
	function checkConnection(){
		$hostname="localhost";
	    $username="saugatth_root";
	    $password="admin";
	    $dbname  ="saugatth_for_prac";
		global $connection;
		$connection = mysqli_connect($hostname , $username, $password, $dbname);

		if ($connection) {
		}else throw new Exception("check your hostname , username, password and databse name");
	}

	try{
		checkConnection();
	}

	catch (Exception $e){
		echo 'Message: ' .$e->getMessage();
	}

?>
