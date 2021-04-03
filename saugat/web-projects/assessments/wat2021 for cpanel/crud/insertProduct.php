<!DOCTYPE html>
<html>
<head>
	<title>display products</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php
		//Make connection to database
		include 'Connection.php';
		//$error = "---";

		//Gather from $_POST[]all the data submitted and store in variables
		if (isset($_POST['btnSub'])) {
			if(!empty($_POST['ProductName'])&& !empty($_POST['Price']) && !empty($_POST['imageName'])){

				if (filter_var($_POST['Price'], FILTER_VALIDATE_FLOAT)) {

					//run query to select all records from prodsucts table
					$query1="SELECT * FROM Products";

					//store the result of the query in a variable called $result
					$result = mysqli_query($connection, $query1);


					$productName = $_POST['ProductName'];
					$productPrice = $_POST['Price'];
					$productImageName = $_POST['imageName'];

					//Construct INSERT query using variables holding data gathered
					if ($connection) {
						$query2 = "INSERT INTO products (ProductName, ProductPrice, ProductImageName)
							VALUES ('$productName', '$productPrice', '$productImageName')";

						//run $query
						if (mysqli_query($connection, $query2)) {
							echo "product detail inserted";
						}else{
							$error =  "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
						}
					}else{
						$error = "check db connection";
					}

					header("Location: {$_SERVER['HTTP_REFERER']}");

				} else {
					header("Location: {$_SERVER['HTTP_REFERER']}");
					$error = "Price must be a floating number in the format '9.99'";
				}
			} else {
				header("Location: {$_SERVER['HTTP_REFERER']}");
				$error = "no field(s) can be left empty";
			}
		}

	?>
</body>
</html>