<!DOCTYPE html>
<html>
<head>
	<title>amend</title>
	<link rel="stylesheet" type="text/css" href="crudStyle.css">
</head>
<body>

	<?php
	include 'Connection.php';
	$id = $_GET['aID'];

	$query = "SELECT * FROM products WHERE ProductID = $id";
	$productInfo = mysqli_query($connection, $query);

	while($info = mysqli_fetch_assoc($productInfo)){
?>
		<form method='POST' action='updateProduct.php'>
			<fieldset>
				<legend> Amend Product Details</legend>

				<input type="hidden" name="upProductID" value="<?php echo $info['ProductID'];?>">

		        <label for="upProductName"> Product Name:</label> <br/>
		        <input type="text" name="upProductName" value = "<?php echo $info['ProductName'];?>">
		        <br/> <br/>

		        <label for="upPrice"> Price:</label> <br/>
		        <input type="text" name="upPrice" value = "<?php echo $info['ProductPrice'];?>">
		        <br/> <br/>

		        <label for="upimageName"> Image Filename:</label> <br/>
		        <input type="text" name="upimageName" value = "<?php echo $info['ProductImageName'];?>">
		        <br/> <br/>

		        <button type="submit" name="btnAmend">Submit</button>
		        <button type = "clear" name = "clr">Clear</button>
	        </fieldset>
   		 </form>
   	<?php
	}

	?>

</body>
</html>

