
<?php
    // $filter_date = $_POST['date_filter'];
    // echo $filter_date;

    //make connection
    include "../connection.php";

    // SQL QUERY
    $query = "SELECT bill_id, house_no, power_plan, power_usage, user_total, encurred_date, paid  FROM bill ";
    
    // FETCHING DATA FROM DATABASE
    $result = $conn->query($query);
    
        if ($result->num_rows > 0) 
        {
            echo "
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>Tota(Rs.)</th>
                            <th scope='col'>House No</th>
                            <th scope='col'>Power plan (ampere)</th>
                            <th scope='col'>Power usage (units)</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Paid</th>
                        </tr>
                    </thead>

                    <tbody>
                ";
                    // OUTPUT DATA OF EACH ROW
                    $count = 1;
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>".$row["encurred_date"]."</td>";
                            echo "<td>".$row["house_no"]."</td>";
                            echo "<td>".$row["power_plan"]."</td>";
                            echo "<td>".$row["power_usage"]."</td>";
                            echo "<td>".$row["user_total"]."</td>";
                            echo "<td>";

                                echo " 
                                    <form method='POST'>
                                        <input type='hidden' id='billId' name='billId' value='".$row["bill_id"]."'>
                                        <label class='switch'>
                                            <input onChange='changeStatus(this.id);' id='ch$count' type='checkbox' name='chkBox' ".($row["paid"] == "yes" ? "value='paid' ".'checked' : "value='unpaid'" )." >
                                            <span class='slider'></span>
                                        </label>
                                    </form>
                                    ";

                            echo"</td>";


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
?>

