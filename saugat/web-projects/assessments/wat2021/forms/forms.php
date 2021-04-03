<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Forms</title>
	<link rel="stylesheet" type="text/css" href="formStyle.css">
</head>
<body>
	<div class="main">
	<h1>Processing Input from HTML Forms</h1>

	<h2>Login Form using GET</h2>

	<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<fieldset>
			<legend>
				Login
			</legend>

			<label for="email">Email: </label>
			<input type="text" class="eMail" name="txtEmail" value="<?php if(isset($_POST['txtEmail'])){ echo $_POST['txtEmail']; }?>"/>
			<br/><br/>

			<label for="passwd">Password: </label>
			<input type="password" name="txtPass" class="pass" />
			<br/><br/>

			<input type="submit" value="Submit" name="loginSubmit" />
			<input type="reset" value="Clear" />
		</fieldset>
	</form>

	<br><br>

	<?php
		if (isset($_POST['loginSubmit'])) {
			$email = $_POST['txtEmail'];
			$password = $_POST['txtPass'];

			echo "Email: $email Password: $password";
		}
	?>

	<h2>TODO form Using POST</h2>

	<?php
		$errorImg = "<img src='../PHPFormWk4/delete.png' width = '20px' height = '20px' title = 'delete'/>";
		if (isset($_POST['sbtn'])) {
			if (!empty($_POST['mail'])) {
				if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
					$mail = $_POST['mail'];
					$message = $_POST['msg'];
					if (isset($_POST['cb'])){
						$confirm='Agreed<br />';
					}else $confirm='Not Agreed<br />';
					echo "Email: $mail <br/> Comments: $message<br/> Confirm: $confirm";
				} else $errorEmail = "<p class='error'> $errorImg email is not valid </p>";
			}else $errorEmail = "<p class='error'> $errorImg email must not be empty </p>";
		}
	?>

	<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<fieldset>
			<legend>Comments</legend>

			<label for="mail">Email:</label>
			<input type="text" name="mail" value="" /><?php if (isset($errorEmail)) {echo "$errorEmail";}?>
			<br/>

			<textarea rows="4" cols="50" name="msg"></textarea><br /><br/>

			<label for="checkbox">Click to Confirm: </label>
			<input type="checkbox" name="cb" value="agree"><br /><br/>

			<input type="submit" value="Submit" name="sbtn"/>
			<input type="reset" value="Clear" />
		</fieldset>
	</form>




	<h2> Tax Calculator </h2>

	<?php

		if (isset($_POST['sbtn2'])) {
			if (!empty($_POST['afterPrice']) and !empty($_POST['taxRate'])) {
				if (is_numeric($_POST['afterPrice']) and filter_var($_POST['afterPrice'],FILTER_VALIDATE_FLOAT)
					and preg_match('/^\d+(:?[.]\d{2})$/',$_POST['afterPrice'])) {
					if(floor($_POST['taxRate']) == $_POST['taxRate']){
						$after = $_POST['afterPrice'];
						$taxRate = $_POST['taxRate'];
						$beforeTax = (100 * $after) / (100 + $taxRate);
						echo "Price before tax = ";
						echo "£".round($beforeTax,2);
					}else $taxError = "<p class='error'> $errorImg  Please enter a whole number for tax rate</p><br/>";
				} else $taxError = "<p class='error'> $errorImg  Please enter the price in the format 9.99 </p><br/>";
			}else $taxError = "<p class='error'> $errorImg  All Fields Required </p><br/>";
		}
	?>

	<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<fieldset>
			<legend>Without TAX calculator</legend>

			<label for="afterPrice">After Tax: </label>
			<input type="text" name="afterPrice" />

			<label for="taxRate">Tax Rate: </label>
			<input type="text" name="taxRate" />
			<br><br>
			<?php if (isset($taxError)) {echo "$taxError";}?>
			<input type="submit" value="Submit" name="sbtn2"/>
			<input type="reset" value="Clear" />
		</fieldset>
	</form>




	<h1>Passing Data Appended to an URL</h1>

	<h2>Pick a category</h2>

	<a href = "forms.php?cat=Films">Films</a>

	<a href = "forms.php?cat=Books">Books</a>

	<a href = "forms.php?cat=Music">Music</a>

	<?php
		if (isset($_GET['cat'])) {
			$category = $_GET['cat'];
			echo "<br/><br/>You picked the <b>$category</b> category.<br/>";
		}
	?>
	</div>

	<a href="../index.html">HOME</a>
</body>
</html>


