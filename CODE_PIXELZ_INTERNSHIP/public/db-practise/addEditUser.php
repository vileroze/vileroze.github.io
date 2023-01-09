<?php
    if (isset($_POST['bill-submit'])) {
        //make connection
        include "connection.php";

        // Taking all 4 values from the form data(input)
        $user_name = $_POST['user_name'];
        $house_number = $_POST['house_number'];
        $power = $_POST['power'];
        $units = $_POST['units'];
        $total = $_POST['bill_total'];

        // update query
        $sql = "UPDATE bill SET power_plan = $power, power_usage = $units, user_total = '$total' WHERE customer_name = '$user_name' AND house_no = $house_number;";
        
        if(mysqli_query($conn, $sql)){
            echo "<h3 class='text-success'><strong>".$user_name."</strong>'s data stored successfully.</h3>";
        } else{
            echo "ERROR: Sorry $sql. ". mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
    }
?>

