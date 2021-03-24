<!DOCTYPE html>
<html lang="en">
<head>
	<title>My web document</title>
	<link href="basics.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="main">
		<?php
			echo " <h1> SAUGAT THAPA <br/>77227277 </h1> <br/>";
			echo "\"most programmers say it's hi better to use 'echo' rather than 'print'\" says who?";


			echo "<h2>VARIABLES</h2>";
			$name = "David";
			$age = 12;
			echo 'Hi my name is '.$name.' and I am '.$age.' years old'.'<br>';
			echo "Mi nombre es $name y tengo $age anos de edad ";


			echo "<h2>FUNCTIONS</h2>";
			//gettype() returns the type of the variable
			echo gettype($name);
			echo '<br />';
			//strlen() returns the length of the string
			echo strlen($name);
			echo '<br />';
			//strtoUpper() returns the string to upper case
			echo strtoUpper($name);


			echo "<h2>ARITHMETIC</h2>";
			$num1 = 9;
			$num2 = 12;
			$mult = $num1 * $num2;
			$percent = (($num2 - $num1) / $num2) * 100;
			$remainder = $num2 % $num1;
			$quotient = floor($num2 / $num1);
			$formattedQuotient = number_format($quotient, 0);

			echo "num1 = $num1 <br/>";
			echo "num2 = $num2 <br/>";
			echo "num1 x num2 = $mult <br/>";
			echo "num1 as a percentage of num2 = $percent <br/>";
			echo "num2 divided by num1 = $quotient remainder $remainder <br/> <br/>";

			$height_in_meters = 1.8;
			$height_in_inches = ($height_in_meters * 100) / 2.54;
			$height_in_feet = floor($height_in_inches / 12);
			$inches = ($height_in_inches % 12);

			echo " $name at the age of $age is $height_in_meters meters tall which is $height_in_feet feet $inches inches ";
		?>
	</div>

<a href="../watIndex.html">HOME</a>

</body>
</html>
