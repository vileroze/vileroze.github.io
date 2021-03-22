<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Web Applications and Technologies</title>
		<link type="text/css" rel="stylesheet" href="main.css" />
	</head>
	<body>
		<div class="content">
			<header>
				<h1>Saugat Thapa C77227277</h1>
			</header>
			<section id="container">
				<h1>Fundamentals of PHP</h1>
				<h2>Selection</h2>
				<?php
					$day = date('l');
					//$day = 'Tuesday';
					$day_type2 = date('F');
					$day_type3 = date('o');
					//$hour = date('H');
					$hour = 19;

					if ($day == 'Wednesday') {
						echo "it's mid week <br/>";
					} else{
						echo "it's not mid week <br/>";
					}
					echo 'it\'s '.$day.','.$day_type2.' '.$day_type3.'<br/>';

					if ($hour < 12) {
						echo "Good morning!! <br/>";
					}elseif ($hour >12 and $hour < 18 ) {
						echo "Good Afternoon !! <br/>";
					}else{
						echo "Good Night !! <br/>";
					}

					$password = 'password';
					//$password = 'username';
					$password_len = strlen($password);

					if ($password_len > 4 and $password_len <10) {
						echo "Password length is valid <br/>";
					}else{
						echo "Password length is invalid <br/>";
					}

					$ticketPrice = 25;
					$age = 15;
					$membership = true;

					if ($age< 12) {
						$discount = (50/100) * $ticketPrice;
						$finalPrice = $ticketPrice - $discount;
					}elseif($age>12 and $age<18 or $age > 65){
						$discount = (25/100) * $ticketPrice;
						$finalPrice = $ticketPrice - $discount;
					}

					if($membership){
						$member = "Yes";
						$discount = (10/100) * $ticketPrice;
						$finalPrice = $ticketPrice - $discount;
					} elseif (!$membership) {
						$member = "No";
					}

					echo "<br/><br/>Initial Ticket Price: $ticketPrice <br/>" ;

					echo "Age: $age <br/>";
					echo "Member: $member <br/>";
					echo "Final Ticket Price: $finalPrice <br/>";

				?>

				<h2>Arrays</h2>
				<h3>Simple Arrays</h3>
				<?php
					$products = array("Trimmer", "Hair oil", "Shaving cream");
					print_r($products);

					echo "<br/>";

					$pos = 1;
					$new_product = "Beard oil";

					$products[$pos] = $new_product;
					print_r($products);

					echo "<br/>";

					array_push($products, "axe");
					print_r($products);

					echo "<br/>";

					$count = 0;

					foreach ($products as $product) {
						echo "The item at index[$count] is: ".$product. '<br/>';
						$count++;
					}
				?>

				<h3>Associative Arrays</h3>
				<?php
					$customer = array('CustID'=>12, 'CustName'=>'Sarah', 'CustAge'=>23, 'CustGender'=>'F');

					print_r($customer);
					echo "<br/>";

					$customer[2] = 34;
					print_r($customer);
					echo "<br/>";

					$customer['CustEmail'] = 'sarah@gmail.com';

					echo "The item at index[CustName] is: ".$customer['CustName'],'<br/>';
					echo "The item at index[CustEmail] is:".$customer['CustEmail'],'<br/>';
				?>

				<h3>Multi-Dimensional Associative Arrays</h3>
				<?php
					$stock = array(
						"id1" => array("description" => "t-shirt", "price" => 9.99,"stock" => 100,"color" => array("blue", "green", "red")),
						"id2" => array("description" => "cap", "price" => 4.99,"stock" => 50,"color" => array("blue", "black", "grey")),
						"id3" => array("description" => "mug", "price" => 6.99,"stock" => 30,"color" => array("yellow", "green", "pink")),
					);

					print_r($stock);
					echo "<br/><br/>This is my order: <br/>";

					$first_item =  $stock['id1']['description'];
					$first_item_color = $stock['id1']['color'][1];
					$first_item_price = $stock['id1']['price'];

					$second_item =  $stock['id2']['description'];
					$second_item_color = $stock['id2']['color'][2];
					$second_item_price = $stock['id2']['price'];

					echo "$first_item_color $first_item <br/>";
					echo "Price: £$first_item_price <br/>";
					echo "$second_item_color $second_item <br/>";
					echo "Price: £$second_item_price <br/>";

				?>


				<h2>Loops</h2>
				<h3>While Loop</h3>
				<?php
					$counter = 1;

					while ( $counter < 6) {
						echo 'Count: '.$counter.'<br />';
						$counter++;
					}

					$counter = 1;
					$shirtPrice = 9.99;
				?>

				<table>
					<tr>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
						<?php
							while ($counter <= 10) {
							echo "<tr>";
							$total = $counter * $shirtPrice;
							echo "<td>$counter</td>";
							echo "<td>$total</td>";
							$counter++;
							echo "</tr>";
							}
						?>
				</table>


				<h3>For Loop</h3>
				<?php
					$names = array("Georga", "Russ", "Bia", "Taylor", "Will");

					for ($i=0; $i < 5; $i++) {
						echo $names[$i] .'<br />';
					}
				?>

				<h3>Foreach Loop</h3>
				<?php
					$names = array("Georga" => "c101", "Russ" => "c102", "Bia" => "c103", "Taylor" => "c104", "Will" => "c105");

					foreach ($names as $key => $value) {
						echo "Name: $key   ID: $value <br/>";
					}

					$city = array("Georga" => "liverpool", "Russ" => "lOnDon", "Bia" => "manCHESTER", "Taylor" => "newCastle", "Will" => "bRADford");

					echo "<br/> <br/>";
					print_r($city);
					echo "<br/> <br/>";

					foreach ($city as $key => &$value) {
						$value = ucwords(strtolower($value));
					}
					print_r($city);
					echo "<br/> <br/>";
				?>

				<h3> Some Useful Functions</h3>
				<?php
					$password = "paaaaaaa";
					$password  = trim($password);

					$password = htmlentities($password);
					$pass_len = strlen($password);
					echo "Password is : $password <br/>";
					if (isset($password) and !empty($password)) {
						if ($pass_len >= 6 and $pass_len <= 8) {
							if(is_numeric($password)){
			                	echo 'Password cannot be a number <br/>';
			            	} else{ echo "Password OK <br/>";
			            		$encrptPass = md5($password);
			            		echo "encrypted password: $encrptPass";
			            	}
						} else echo "Your password must be between 6 and 8 characters in length<br/>";
					}else echo "Please enter a password <br/>";
				?>
			</section>
		</div>
		<a href="../watIndex.html">HOME</a>
	</body>
</html>
