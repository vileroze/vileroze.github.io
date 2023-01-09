<?php
    //checks if user present in db and if true redirects user to bill-calculator.php with their respective data
    if (isset($_POST['validate_customer'])) {

        //get form data
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];

        if(!empty($user_name) || !empty($user_password)){
            //make connection
            include "../connection.php";

            // Performing insert query execution
            $sql = "SELECT * FROM bill WHERE customer_name = '$user_name'";
            $result = mysqli_query($conn, $sql);
            
            if($result->num_rows > 0){
                
                session_start();

                while($row = $result->fetch_assoc()) {
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['house_no'] = $row["house_no"];
                    $_SESSION['power_plan'] = $row["power_plan"];
                    $_SESSION['power_usage'] = $row["power_usage"];
                    $_SESSION['user_total'] = $row["user_total"];
                }

                header("Location: ../bill-calculator.php");

            } else{
                echo "<p class='text-danger'>ERROR: There is no user with that name</p>";
            }

            // close the result.
            mysqli_free_result($result);
            
            // Close connection
            mysqli_close($conn);
        }else{
            echo "<p class='text-danger'>ERROR: All the fields must be filled</p>";
        } 
    }

?>