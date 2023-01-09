<?php

    //adds new customer to db and if true redirects user to bill-calculator.php with their respective data
    if (isset($_POST['add_customer'])) {

        //get form data
        $user_name = $_POST['new_user_name'];
        $house_no = $_POST['house_number'];

        if(!empty($user_name) && !empty($house_no)){
            //make connection
            include "../connection.php";

            // Performing insert query execution
            $sql = "INSERT INTO bill VALUES ('$user_name', $house_no,5,0,'Your total charge is: 0')";

            if(mysqli_query($conn, $sql)){
                
                session_start();

                $_SESSION['user_name'] = $user_name;
                $_SESSION['house_no'] = $house_no;
                $_SESSION['power_plan'] = 5;
                $_SESSION['power_usage'] = 0;
                $_SESSION['user_total'] = 'Your total charge is: 0';

                header("Location: ../bill-calculator.php");

            } else{
                echo "<p class='text-danger'>ERROR: Sorry something went wrong please try again later</p>";
            }

            // close the result.
            mysqli_free_result($result);
            
            // Close connection
            mysqli_close($conn);
        }else {
            echo "<p class='text-danger'>ERROR: All the fields must be filled</p>";
        } 
    }
?>