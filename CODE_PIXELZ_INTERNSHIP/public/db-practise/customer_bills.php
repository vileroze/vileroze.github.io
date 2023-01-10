
<?php
    if (isset($_POST['filter_bill'])) {
        $filter_date = $_POST['date_filter'];
        // echo $filter_date;

        //make connection
        include "connection.php";

        // SQL QUERY
        $query = "SELECT * FROM bill WHERE encurred_date = '$filter_date' AND house_no = ".$_SESSION['house_no']." ;";
        
        // FETCHING DATA FROM DATABASE
        $result = $conn->query($query);
        
            if ($result->num_rows > 0) 
            {
                $count = 1;
                echo "
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Power plan (ampere)</th>
                                <th scope='col'>Power usage (units)</th>
                                <th scope='col'>Total</th>
                                <th scope='col'>Date</th>
                                <th scope='col'>Paid</th>
                            </tr>
                        </thead>

                        <tbody>
                    ";
                        // OUTPUT DATA OF EACH ROW
                        while($row = $result->fetch_assoc())
                        {
                            echo "<tr>";
                                echo "<th scope='row'>$count</th>";
                                echo "<td>".$row["power_plan"]."</td>";
                                echo "<td>".$row["power_usage"]."</td>";
                                echo "<td>".$row["user_total"]."</td>";
                                echo "<td>".$row["encurred_date"]."</td>";
                                echo "<td>".$row["paid"]."</td>";
                            echo "</tr>";
                            $count++;
                        }
                echo "
                        </tbody>
                    </table>
                ";
            } 
            else {
                echo "0 results";
            }
        
        $conn->close();
    }
?>

