<!DOCTYPE html>
<html>
<head>
	<title>crud</title>
	<link rel="stylesheet" type="text/css" href="crudStyle.css">

</head>
<body>
	<div class="main">
	<h1>Manage Products</h1>

	<?php
		include 'displayProducts.php';
	?>

	<br><br>

	<form method="POST" action="insertProduct.php">
		<fieldset>
			<legend> Enter New Product Details</legend>
	        <label for="ProductName"> Product Name:</label> <br/>
	        <input type="text" name="ProductName">
	        <br/> <br/>

	        <label for="Price"> Price:</label> <br/>
	        <input type="text" name="Price">
	        <br/> <br/>

	        <label for="imageName"> Image Filename:</label> <br/>
	        <input type="text" name="imageName">
	        <br/> <br/>

	        <button type="submit" name="btnSub">SUBMIT</button>
	        <input type = "reset" value = "CLEAR">
        </fieldset>
    </form>

    <?php
    	include 'insertProduct.php';
    ?>
    </div>
    <a href="../index.html">HOME</a>
</body>
</html>
