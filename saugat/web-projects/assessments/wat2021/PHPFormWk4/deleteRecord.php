<?php
	include './mysql/Connection.php';

	$id = $_GET['cId'];

	$query = "DELETE FROM customer WHERE CustomerId = $id";
	mysqli_query($connection, $query);

	header("Location: http://localhost/wat2021/PHPFormWk4/mysql.php");
?>