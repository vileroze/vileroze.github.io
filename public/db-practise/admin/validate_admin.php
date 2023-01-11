<?php
    //checks if user present in db and if true redirects user to bill-calculator.php with their respective data
    if (isset($_POST['admin_validation'])) {

        //get form data
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];

        if(!empty($admin_username) && !empty($admin_password)){


            //make connection
            include "../connection.php";

            //convert to md5 before checking | john -> 527bd5b5d689e2c32ae974c6229ff785
            $admin_password_md5 = md5($admin_password);

            //check if admin exists
            $sql = "SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password_md5'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                session_start();

                while($row = $result->fetch_assoc()) {
                    $_SESSION['admin_user'] = $row["admin_username"];
                }
                echo "<p class='text-success'>Admin verified!!". $_SESSION['admin_user']."</p>";
                header("Location: ../admin/admin-home.php");
                
            }else{
                echo "<p class='text-danger'>ERROR: No admin with the given details found</p>";
            }

            // close the result.
            mysqli_free_result($result);
                
            // Close connection
            mysqli_close($conn);

        }else{
            echo "<p class='text-danger'>ERROR: Enter username and password</p>";
        } 
    }

?>