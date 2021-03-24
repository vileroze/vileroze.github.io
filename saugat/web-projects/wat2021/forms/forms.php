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

	<form method="POST" action="forms.php">
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

	<form method="POST" action="forms.php">
		<fieldset>
			<legend>Comments</legend>

			<label for="mail">Email: </label>
			<input type="text" name="mail" value="" /><br /><br/>

			<textarea rows="4" cols="50" name="msg"></textarea><br /><br/>

			<label for="checkbox">Click to Confirm: </label>
			<input type="checkbox" name="cb" value="agree"><br /><br/>

			<input type="submit" value="Submit" name="sbtn"/>
			<input type="reset" value="Clear" />
		</fieldset>
	</form>

	<br><br>

	<?php

		if (isset($_POST['sbtn'])) {
			if (!empty($_POST['mail'])) {
				if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
					$mail = $_POST['mail'];
				} else{
					echo "email is not valid <br/>";
				}
			}else{
				echo "email must not be empty <br/>";
			}

			$message = $_POST['msg'];

			if (isset($_POST['cb'])){
			$confirm='Agreed<br />';
			}else{
				$confirm='Not Agreed<br />';
			}

			echo "Email: $mail <br/> Comments: $message<br/> Confirm: $confirm";
		}
	?>

	<h2> Tax Calculator </h2>

	<form method="POST" action="forms.php">
		<fieldset>
			<legend>Without TAX calculator</legend>

			<label for="afterPrice">After Tax: </label>
			<input type="text" name="afterPrice" />

			<label for="taxRate">Tax Rate: </label>
			<input type="text" name="taxRate" />
			<br><br>
			<input type="submit" value="Submit" name="sbtn2"/>
			<input type="reset" value="Clear" />
		</fieldset>
	</form>

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
					}else echo "Please enter a whole number for tax rate<br/>";
				} else echo "Please enter the price in the format 9.99 <br/>";
			}else echo "All Fields Required <br/>";
		}
	?>


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

	<a href="../watIndex.html">HOME</a>
</body>
</html>


