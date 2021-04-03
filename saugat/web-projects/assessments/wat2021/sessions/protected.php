<!DOCTYPE html>
<html>
<head>
	<title>protected</title>
	<link rel="stylesheet" type="text/css" href="sessionStyle.css">
</head>
<body>
	<div class="main">
	<?php

		include 'init.php';

		if(!isset($_SESSION['user'])){

		header ('location: http://localhost/wat2021/sessions/sessions.php');

		}
	?>

	<p>This is protected content: write down your secrets <?php echo $_SESSION['user'];?>...</p>

	<button><a href="logout.php">LOGOUT</a></button>
	</div>
</body>
</html>

