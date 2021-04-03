<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Record</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

	include './mysql/Connection.php';

	$id = $_GET['cId'];
	$query = "SELECT * FROM customer WHERE CustomerId = $id";
	$customer_info = mysqli_query($connection, $query);

	foreach ($customer_info as $info){

		?>
		<h2>Edit form</h2>
		<form method = 'POST' action = ''>
			<label>First Name</label>
			<input type="text" name="FirstName" value="<?php echo "$info[FirstName]";?>"/>
			<br/><br/>

			<label>Last Name</label>
			<input type="text" name="LastName" value="<?php echo "$info[LastName]";?>"/>
			<br/><br/>

			<label>Email</label>
			<input type="text" name="Email" value="<?php echo "$info[Email]";?>"/>
			<br/><br/>

			<label>Password</label>
			<input type="text" name="Password" value="<?php echo "$info[Password]";?>"/>
			<br/><br/>

			<label>Gender</label>
			<input type="text" name="Gender" value="<?php echo "$info[Gender]";?>"/>
			<br/><br/>

			<label>Age</label>
			<input type="text" name="Age" value="<?php echo "$info[Age]";?>"/>
			<br/><br/>

			<input type="submit" name="update" value="UPDATE" />
		</form>
	<?php
	}
		if(isset($_POST['update'])){
			$FirstName = $_POST['FirstName'];
			$LastName = $_POST['LastName'];
			$Email = $_POST['Email'];
			$Password = $_POST['Password'];
			$Gender = $_POST['Gender'];
			$Age = $_POST['Age'];


			$query2 = "UPDATE customer SET FirstName = '$FirstName', LastName = '$LastName', Email = '$Email',
					 Password = '$Password', Gender = '$Gender', Age = '$Age' WHERE CustomerId = $id";

			mysqli_query($connection, $query2);
			header("Location: http://saugatthapa.com.np/PHPFormWk4/mysql.php");
		}
	?>
</body>
</html>
