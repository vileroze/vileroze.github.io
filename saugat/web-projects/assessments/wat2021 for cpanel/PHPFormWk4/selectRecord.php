<?php

	//Display heading
	echo '<h2>Select ALL from the customer Table</h2>';


	//run query to select all records from customer table
	$query="SELECT * FROM customer";

	//store the result of the query in a variable called $result
	$result=mysqli_query($connection, $query);

	//Use a while loop to iterate through your $result array and display
	//the first name, last name and email for each record
	while ($row=mysqli_fetch_assoc($result)){
	echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].'<br />';
	}

	//---------------------------------------------------------

	//Display heading
	echo '<h2>Select ALL from the customer Table with Age > 22</h2>';

	//run query to select all records from customer table
	$query1="SELECT * FROM customer WHERE Age>22";

	//store the result of the query in a variable called $result
	$result1=mysqli_query($connection, $query1);

	//Use a while loop to iterate through your $result array and display
	//the first name, last name and email for each record
	while ($row=mysqli_fetch_assoc($result1)){
	echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].'<br />';
	}

	//---------------------------------------------------------

	//Display heading
	echo '<h2>Select ALL from the customer Table with Age >= 22</h2>';

	//run query to select all records from customer table
	$query2="SELECT * FROM customer WHERE Age>=22";

	//store the result of the query in a variable called $result
	$result2=mysqli_query($connection, $query2);

	//Use a while loop to iterate through your $result array and display
	//the first name, last name and email for each record
	while ($row=mysqli_fetch_assoc($result2)){
	echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].'<br />';
	}

	//---------------------------------------------------------

	//Display heading
	echo '<h2>Select Males from the customer Table list by age descending</h2>';

	//run query to select all records from customer table
	$query3="SELECT * FROM customer ORDER BY Age DESC;";

	//store the result of the query in a variable called $result
	$result3=mysqli_query($connection, $query3);

	//Use a while loop to iterate through your $result array and display
	//the first name, last name and email for each record
	while ($row=mysqli_fetch_assoc($result3)){
	echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].'<br />';
	}

	//---------------------------------------------------------

	//Display heading
	echo '<h2>Select ALL from the customer Table with "a" in the first name</h2>';

	//run query to select all records from customer table
	$query4="SELECT * FROM customer WHERE FirstName LIKE '%a%'";

	//store the result of the query in a variable called $result
	$result4=mysqli_query($connection, $query4);

	//Use a while loop to iterate through your $result array and display
	//the first name, last name and email for each record
	while ($row=mysqli_fetch_assoc($result4)){
	echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].'<br />';
	}


?>
