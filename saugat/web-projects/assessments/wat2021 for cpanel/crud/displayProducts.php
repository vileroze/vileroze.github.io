<!DOCTYPE html>
<html>
<head>
	<title>display products</title>
	<link rel="stylesheet" type="text/css" href="crudStyle.css">
</head>
<body>
	<?php
		//Make connection to database
		include 'Connection.php';

		//run query to select all records from prodsucts table
		$query="SELECT * FROM products";

		//store the result of the query in a variable called $result
		$result=mysqli_query($connection, $query);

	?>

	<table>
		<tr>
			<th>Product Name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Amend</th>
			<th>Delete</th>
		</tr>
		<?php 
			while ($row=mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row['ProductName']."</td>";
				echo "<td>".$row['ProductPrice']."</td>";
				echo '<td><img class = "productImages" src="./images/' . $row['ProductImageName'] .'.jpg' .'" /></td>';
				echo '<td><a href="amendProduct.php?aID='. $row['ProductID'].'">
				<input type = "image" src="../PHPFormWk4/edit.png" width = "34px" height = "34px"
				title = "edit"/></a></td>';
				echo '<td><a href="deleteProduct.php?uID='. $row['ProductID'].'">
				<input type = "image" src="../PHPFormWk4/delete.png" width = "34px" height = "34px"
				title = "delete"/></a></td>';
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>






