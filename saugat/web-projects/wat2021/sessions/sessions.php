<!DOCTYPE html>
<html>
<head>
    <title>session</title>
    <link rel="stylesheet" type="text/css" href="sessionStyle.css">
</head>
<body>
    <h1>Login</h1>
    <?php

        include 'init.php';

        if (isset($_SESSION['user'])) {
            echo "<p>".$_SESSION['user']." is logged in right now </p>";
            
        }elseif (isset($_SESSION['error'])) {
            include 'loginform.php';
            echo $_SESSION['error'];
        } else{
            include 'loginform.php';
            //echo "no one has logged in";
            $_SESSION['error'] =  "no one has logged in";
            echo $_SESSION['error'];
        }
    ?>

    <br><br>

    <button><a href="protected.php">PROTECTED</a></button>
    <button><a href="logout.php">LOGOUT</a></button>
</body>
</html>