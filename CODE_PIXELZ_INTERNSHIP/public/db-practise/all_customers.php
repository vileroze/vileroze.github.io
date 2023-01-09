
<?php
    //make connection
    include "connection.php";

    // SQL QUERY
    $query = "SELECT * FROM bill;";
    
    // FETCHING DATA FROM DATABASE
    $result = $conn->query($query);

    $count = 1;
    
        if ($result->num_rows > 0) 
        {
            // OUTPUT DATA OF EACH ROW
            while($row = $result->fetch_assoc())
            {
                echo "Name: ". $row["customer_name"] ." | ".
                    "House number: " .$row["house_no"]." | ".
                    $row["power_plan"]. " ampere | " . 
                    $row["power_usage"]. " units<br>";
            }
        } 
        else {
            echo "0 results";
        }
    
    $conn->close();
?>

