<!DOCTYPE html>
<html>
<head>
    <title>session</title>
    <link rel="stylesheet" type="text/css" href="sessionStyle.css">
</head>
<body>

    <div class="main">
    <h1>Login</h1>
    <h3>try username: smthapa | password: smth01</h3>
    <?php
        include 'init.php';

        if (isset($_SESSION['user'])) {
            echo "<p>".$_SESSION['user']." is logged in right now </p>";

        }elseif (isset($_SESSION['error'])) {
            include 'loginform.php';
            echo $_SESSION['error'];
        } else{
            include 'loginform.php';
            $_SESSION['error'] =  "no one has logged in";
            echo $_SESSION['error'];
        }
    ?>

    <br><br>

    <button><a class="buttons" href="protected.php">PROTECTED</a></button>
    <button><a class="buttons" href="logout.php">LOGOUT</a></button>
    </div>
    <button><a href="../watIndex.html">HOME</a></button>
</body>
</html>
