<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="registerStyle.css">
</head>
<body>
	<div class="main">
	<?php
		include 'Connection.php';
	?>

	<h1 class="header">Register</h1>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="userEmail">Email:</label>
		<input type="text" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail'];?>">
		<br>

		<label for="userName">Username:</label>
		<input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName'];?>">
		<br>

		<label for="userAgeGroup">Age group:</label>
		<select id="userAgeGroup" name="userAgeGroup">userAgeGroup
		  <option value="null" selected disabled>--select--</option>
		  <option value="child" <?php if(isset($_POST['userAgeGroup']) && $_POST['userAgeGroup'] == 'child'){echo "selected";}?>>Child (1 - 17)</option>
		  <option value="adult" <?php if(isset($_POST['userAgeGroup']) && $_POST['userAgeGroup'] == 'adult'){echo "selected";}?>>Adult (18 - 59)</option>
		  <option value="senior" <?php if(isset($_POST['userAgeGroup']) && $_POST['userAgeGroup'] == 'senior'){echo "selected";}?>>Senior (60 - )</option>
		</select>
		<br>

		<label for="userPassword">Password:</label>
		<input type="password" name="userPassword" value="<?php if(isset($_POST['userPassword'])) echo $_POST['userPassword'];?>">
		<br>

		<label for="terms">I agree to the terms and conditions:</label>
		<input type="checkBox" name="terms" <?php if(isset($_POST['terms'])){echo "checked";}?>>
		<br> <br>
		<input type="submit" name = "submit" value="SUBMIT">
	</form>

	<?php
		if (isset($_POST['submit'])) {
			if (isset($_POST['terms'])) {
				if(!empty($_POST['userEmail']) and !empty($_POST['userName']) and !empty($_POST['userAgeGroup']) and !empty($_POST['userPassword']) and isset($_POST['userAgeGroup'])){

					$userAgeGroup = $_POST['userAgeGroup'];

					if (filter_var(trim($_POST['userEmail']), FILTER_VALIDATE_EMAIL)) {
						$userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);

						if (strlen($_POST['userName']) >= 6 ) {
							$username = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
							if (preg_match('/[A-Z]/', $_POST['userPassword']) and preg_match('/[a-z]/', $_POST['userPassword']) and (1 === preg_match('~[0-9]~', $_POST['userPassword']))) {
								$userPassword = filter_var($_POST['userPassword'],FILTER_SANITIZE_STRING);
								$encryptedPass = md5($userPassword);

								if($connection){
									$query = "INSERT INTO register(email, userName, ageGroup, password) VALUES ('$userEmail', '$username', '$userAgeGroup', '$encryptedPass')";


									if(mysqli_query($connection, $query)){
										echo "<br> <br>You have been successfully registered<br> <br>";
									} else echo "<br> <br>record not inserted<br> <br>";
								}

							} else echo "<br> <br>Password nust contain at least one uppercase letter, one lowercase letter and a number<br> <br>";

						} else echo "<br> <br>username must be atleast 6 characters long<br> <br>";

					} else echo "<br> <br>Please enter a valid email<br> <br>";
				} else echo "<br> <br>Non of the field should be empty<br> <br>";
			} else echo "<br> <br>Please agree to the terms and conditions to continue<br> <br>";
		}
	?>
	</div>
	<a href="../watIndex.html">HOME</a>
</body>
</html>
