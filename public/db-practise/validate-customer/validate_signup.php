<?php

    //adds new customer to db and if true redirects user to bill-calculator.php with their respective data
    if (isset($_POST['add_customer'])) {

        //get form data
        $user_name = $_POST['new_user_name'];
        $house_no = $_POST['house_number'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];


        if(!empty($user_name) && !empty($house_no) && !empty($user_email) && !empty($user_password)){
            
            //make connection
            include "../connection.php";

            //check if house number already present in db
            $sql = "SELECT * FROM customer WHERE house_no = $house_no";
            $result = $conn->query($sql);

            if($result->num_rows == 0){

                //check if password contains letters and numbers
                if(preg_match('/[A-Za-z]/', $user_password) && preg_match('/[0-9]/', $user_password)){

                    //convert to md5 before storing
                    $user_password_md5 = md5($user_password);

                    // Performing insert query execution
                    $sql = "INSERT INTO customer VALUES ('$user_name', $house_no, '$user_email', '$user_password_md5')";

                    if(mysqli_query($conn, $sql)){
                        
                        echo "<h3 class='text-success'>Signup successfull, you can proceed to login</h3>";

                    } else{
                        echo "<p class='text-danger'>ERROR: Sorry something went wrong please try again later</p>";
                    }

                    // close the result.
                    mysqli_free_result($result);
                    
                    // Close connection
                    mysqli_close($conn);
                }else{
                    echo "<p class='text-danger'>ERROR: Password must contain both letter and numbers</p>";
                }

            }else{
                echo "<p class='text-danger'>ERROR: House number already exists</p>";
            }

        }else {
            echo "<p class='text-danger'>ERROR: All the fields must be filled</p>";
        } 
    }
?>