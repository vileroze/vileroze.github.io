<?php
    //checks if user present in db and if true redirects user to bill-calculator.php with their respective data
    if (isset($_POST['validate_customer'])) {

        //get form data
        $house_no = $_POST['login_house_number'];
        $user_password = $_POST['login_user_password'];

        if(!empty($house_no) && !empty($user_password)){


            //make connection
            include "../connection.php";

            //convert to md5 before checking | john -> 527bd5b5d689e2c32ae974c6229ff785
            $user_password_md5 = md5($user_password);

            //check if house number already present in db
            $sql = "SELECT * FROM customer WHERE house_no = '$house_no' AND user_password = '$user_password_md5'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                session_start();

                while($row = $result->fetch_assoc()) {
                    $_SESSION['user_name'] = $row["customer_name"];
                    $_SESSION['house_no'] = $row["house_no"];
                }
                echo "<p class='text-success'>Customer verified!!". $_SESSION['user_name']."||". $_SESSION['house_no']."</p>";
                header("Location: ../bill-calculator.php");
                
            }else{
                echo "<p class='text-danger'>ERROR: No user with the given details found</p>";
            }

            // close the result.
            mysqli_free_result($result);
                
            // Close connection
            mysqli_close($conn);

        }else{
            echo "<p class='text-danger'>ERROR: Enter your house number and password</p>";
        } 
    }

?>