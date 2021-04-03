<?php
	
	include 'Connection.php';

	if (isset($_POST['btnAmend'])) {
		$productId = $_POST['upProductID'];
		$productName = $_POST['upProductName'];
		$productPrice = $_POST['upPrice'];
		$productImgName = $_POST['upimageName'];

		$query2 = "UPDATE products SET ProductName = '$productName', ProductPrice = '$productPrice'				,ProductImageName = '$productImgName' WHERE ProductID = $productId";

		if(mysqli_query($connection, $query2)){
			echo "The product has been updated";
		}else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
		}

		header("Location: http://localhost/wat2021/crud/crud.php");
	}
?>