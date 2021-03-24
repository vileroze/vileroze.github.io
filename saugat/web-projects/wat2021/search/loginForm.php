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


	<h1>Login to view items</h1>
	<h2>Try username: vileroze | password: Vile22</h2>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="userName">Username: </label>
		<input type="text" name="userName">
		<br><br>

		<label for="pass">Password: </label>
		<input type="password" name="pass">
		<br><br>

		<input type="submit" name="submit" value="SUBMIT">
		<br><br>
	</form>

	<?php
		if (isset($_POST['submit'])) {
			if (!empty($_POST['userName']) and !empty($_POST['pass'])) {
				$username = $_POST['userName'];
				$password = $_POST['pass'];

				$query = "SELECT * FROM register WHERE userName = '$username' AND password = '".md5($password)."'";
				$result = mysqli_query($connection, $query);
				$rows = mysqli_num_rows($result);

				if ($rows == 1) {
					$_SESSION['user'] = $username;
					header("location: http://localhost/wat2021/search/search.php");
				} else echo "<br><br>check your username and password<br><br>";
			}else echo "<br><br>Non of the fields can be left empty<br><br>";
		}
	?>

</body>
</html>
