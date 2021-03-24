<?php


include 'init.php';

//Gather details submitted from the $_POST array and store in local vars
if (isset($_POST['subLogin'])) {
    $userName = $_POST['txtUser'];
    $password = $_POST['txtPass'];
}

echo "$userName <br/>";
echo "$password <br/>";

//build query to SELECT records from the users table WHERE the username AND password in the table are equal to those entered.
$query = "SELECT * FROM users WHERE username = '$userName' AND password = '$password';";

//run query and store result
$userInfo = mysqli_query($connection, $query);

//check result and generate message with code below
if ($row = mysqli_fetch_assoc($userInfo)) {
    $_SESSION['user']=$userName;
    header ('location: http://localhost/wat2021/sessions/sessions.php');
} else {
    $_SESSION['error']= 'User not recognised';
    header ('location: http://localhost/wat2021/sessions/sessions.php', $_SESSION['error']);
}



?>
