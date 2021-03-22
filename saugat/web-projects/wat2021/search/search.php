<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<link rel="stylesheet" type="text/css" href="searchStyle.css">
</head>
<body>
	<?php
		include 'Connection.php';
	?>

	<h1>Search</h1>

	<h3> <?php
		if (isset($_SESSION['user'])) {
			echo "Welcome ".$_SESSION['user']." !!";
		} ?></h3>

	<?php include 'searchForm.php'; ?>

	<br><br>

	<?php include 'searchItems.php'; ?>

	<form method="POST" class="logoutButton" action="logout.php">
		<input type="submit" name="logout" value="LOGOUT">
	</form>

</body>
</html>
