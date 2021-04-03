<?php ob_start(); ?>
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
	    $errorImg = "<img src='../PHPFormWk4/delete.png' width = '34px' height = '34px' title = 'delete'/>";
		if (isset($_POST['submit'])) {
			if (!empty($_POST['userName']) and !empty($_POST['pass'])) {
				$username = $_POST['userName'];
				$password = $_POST['pass'];

				$query = "SELECT * FROM register WHERE userName = '$username' AND password = '".md5($password)."'";
				$result = mysqli_query($connection, $query);
				$rows = mysqli_num_rows($result);

				if ($rows == 1) {
					$_SESSION['user'] = $username;
					header("location:search.php");exit;
				} else echo "<br><br><p class='error'> $errorImg check your username and password</p><br><br>";
			}else echo "<br><br><p class='error'> $errorImg Non of the fields can be left empty</p><br><br>";
		}
	?>
	<a href="../index.html">HOME</a>
</body>
</html>
