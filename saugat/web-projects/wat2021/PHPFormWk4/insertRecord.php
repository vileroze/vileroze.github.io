<?php
    
    include './mysql/Connection.php'; 

    if(isset($_POST['btn'])){
        $first_name =$_POST['FirstName'];
        $last_name =$_POST['LastName'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        if($connection){
            $query="INSERT INTO customer(FirstName, LastName, Email, Password, Gender, Age) 
                VALUES ('$first_name','$last_name','$email','$password','$gender','$age')";

            if(mysqli_query($connection, $query)){
                echo "Record inserted successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            }
            
        } else {
            echo"check db connection";
        }
    }
    header("Location: http://localhost/wat2021/PHPFormWk4/mysql.php");
?> 