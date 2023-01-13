<?php
    // if(!empty($_POST['chkBox'])){

        if(isset($_POST['chkBox'])){

            $og_status = $_POST['chkBox'];
            $bill_id = $_POST["billId"];
            $new_status = "";

            //make connection
            include "../connection.php";

            if($og_status == "unpaid"){
                $new_status = "yes";
            }else if($og_status == "paid"){
                $new_status = "no";
            }

            // SQL QUERY
            $query = "UPDATE bill SET paid = '$new_status' WHERE bill_id = $bill_id ";
            
            // FETCHING DATA FROM DATABASE
            $result = $conn->query($query);

            $conn->close();
        }
        
    // }    

?>