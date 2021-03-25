<?php
$errorImg = "<img src='../PHPFormWk4/delete.png' width = '20px' height = '20px' title = 'delete'/>";

    if(isset($_POST['mysqlbut'])){
        if (!empty($_POST['FirstName']) and !empty($_POST['LastName']) and !empty($_POST['pass']) and !empty($_POST['gender']) and !empty($_POST['age'])) {
            $first_name = $_POST['FirstName'];
            $last_name = $_POST['LastName'];
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            if($connection){
                $query="INSERT INTO customer (FirstName, LastName, Email, Password, Gender, Age)
                    VALUES ('$first_name','$last_name','$email','$password','$gender','$age')";
                    if(mysqli_query($connection, $query)){
                        $_SESSION['successMsg'] = "<p class='success'> <b> Record inserted successfully. </b></p>";
                        session_destroy();
                    } else echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            } else echo"check db connection";
        } else $_SESSION['errorMsg'] = "<p class='error'> $errorImg <b> all fields should be filled </b></p>";
    }
?>
