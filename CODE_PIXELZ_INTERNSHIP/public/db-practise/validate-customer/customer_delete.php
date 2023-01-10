<?php
    session_start();

    //make connection
    include "../connection.php";

    $u_house_no = $_SESSION['house_no'];

    // delete user 
    $sql1 = "DELETE FROM customer WHERE house_no = $u_house_no";

    //delete all bill associated with user
    $sql2 = "DELETE FROM bill WHERE house_no = $u_house_no";
    
    if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)){

        //clear session and send to login screen
        session_start();
        session_unset();
        session_destroy();
        header('Location: customer_login.php');

    } else{
        echo "<p class='text-danger'>ERROR: Something went wrong please try again later</p>";
    }

    // close the result.
    mysqli_free_result($result);
    
    // Close connection
    mysqli_close($conn);

    
?>