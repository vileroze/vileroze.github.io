<?php

	//Make connection to database
	include 'Connection.php';

	//Gather id from $_GET[]
	$id = $_GET['uID'];

	//Construct DELETE query to remove record where WHERE id provided equals the id in the table
	$query = "DELETE FROM products WHERE ProductID = $id";

	//run $query
	if (mysqli_query($connection, $query)) {
		echo "The product has been deleted";
	}else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
	}

	// check to see if any rows were affected
	if (mysqli_affected_rows($connection) > 0) {
		header("Location: http://saugatthapa.com.np/crud/crud.php");
	} else {
		echo "Error in query: $query. " . mysqli_error($connection);
		exit ;
	}

?>
