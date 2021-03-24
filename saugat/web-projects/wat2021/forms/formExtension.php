<!DOCTYPE html>
<html>
<head>
	<title>Extension form exercises</title>

	<link rel="stylesheet" type="text/css" href="formStyle.css">
</head>
<body>

	<h1>Order Form</h1>
	<p>Please fill out this form to place your order</p>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
			<legend>Enter your login details: </legend>

			<label for="userName">User Name</label>
			<input type="text" name="userName"  value = "<?php if(isset($_POST['userName'])) echo $_POST['userName'];?>"/>

			<label for="userEmail">Email: </label>
			<input type="text" name="userEmail" value = "<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail'];?>"  />
		</fieldset>

	<br> <br>

		<fieldset>
			<legend>Pizza Selection</legend>

			<br>

			<label>Size:</label>
			<input type="radio" id = "small" name="size" value="small" <?php if(isset($_POST['size']) && $_POST['size'] == 'small'){echo "checked";}?> required>
			<label for="small">Small</label>

			<input type="radio" id = "medium" name="size" value="medium" <?php if(isset($_POST['size']) && $_POST['size'] == 'medium'){echo "checked";}?> required>
			<label for="medium">Medium</label>

			<input type="radio" id = "large" name="size" value="large" <?php if(isset($_POST['size']) && $_POST['size'] == 'large'){echo "checked";}?> required>
			<label for="large">Large</label>


			<br><br>

			<label for="toppings">Topping:</label>
			<select name="toppings" id="toppings" required>
			  <option value="Garlic" <?php if(isset($_POST['toppings']) && $_POST['toppings'] == 'Garlic'){echo "selected";}?>>Garlic</option>
			  <option value="Mushrooms" <?php if(isset($_POST['toppings']) && $_POST['toppings'] == 'Mushrooms'){echo "selected";}?>>Mushrooms</option>
			  <option value="Peppers" <?php if(isset($_POST['toppings']) && $_POST['toppings'] == 'Peppers'){echo "selected";}?>>Peppers</option>
			  <option value="Proscuitto" <?php if(isset($_POST['toppings']) && $_POST['toppings'] == 'Proscuitto'){echo "selected";}?>>Proscuitto</option>
			</select>

			<br><br>

			<label>Extras:</label>
			<input type="checkbox" id="extra_list[]" name="extra_list[]" value="Parmesan" <?php if(isset($_POST['extra_list']) && is_array($_POST['extra_list']) && in_array('Parmesan', $_POST['extra_list'])) echo 'checked="checked"'; ?> >
			<label for="extra_list[]">Parmesan</label>

			<input type="checkbox" id="extra_list[]" name="extra_list[]" value="Olives"  <?php if(isset($_POST['extra_list']) && is_array($_POST['extra_list']) && in_array('Olives', $_POST['extra_list'])) echo 'checked="checked"'; ?>>
			<label for="extra_list[]">Olives</label>

			<input type="checkbox" id="extra_list[]" name="extra_list[]" value="Capers"  <?php if(isset($_POST['extra_list']) && is_array($_POST['extra_list']) && in_array('Capers', $_POST['extra_list'])) echo 'checked="checked"'; ?>>
			<label for="extra_list[]">Capers</label>

			<br><br>
		</fieldset>

		<br><br>

		<input type="submit" value="Submit" name="sbtn"/>
		<input type="reset" value="Clear" />
		<br> <br>
	</form>
	<a href="../watIndex.html">HOME</a>

	<?php
		if (isset($_POST['sbtn'])) {
			if (!empty($_POST['userEmail'])) {
				if (filter_var(trim($_POST['userEmail']), FILTER_VALIDATE_EMAIL)) {

					$userEmail = $_POST['userEmail'];
					$userName = $_POST['userName'];
					$order = $_POST['size'];
					$toppings = $_POST['toppings'];

					echo "<br/><br/>";
					echo "<h2> Thank You for your order!! </h2> <br/>";
					echo "Customer ID: <b> $userName </b> <br>";
					echo "Email: <b> $userEmail </b> <br/>";
					echo "Your Order: <b> $order $toppings </b> <br/>";
					echo "Extra Toppings: ";
					if(!empty($_POST['extra_list'])){
						foreach($_POST['extra_list'] as $selected){
							echo "<b>".$selected.", </b>";
						}
					}
				} else{
					echo "email is not valid <br/>";
				}
			}else{
				echo "email must not be empty <br/>";
			}
		}
	?>

</body>
</html>
