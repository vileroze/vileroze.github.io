<?php
    session_start();

    //make connection
    include "../connection.php";

    $u_name = $_SESSION['user_name'];
    $u_house_no = $_SESSION['house_no'];

    // delete user quer
    $sql = "DELETE FROM bill WHERE customer_name = '$u_name ' AND house_no = $u_house_no";
    
    if(mysqli_query($conn, $sql)){

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