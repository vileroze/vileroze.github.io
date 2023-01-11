<?php
    $total_customers = 0;
    $total_paid_bills = 0;
    $total_unpaid_bills = 0;
    $most_used_powerplan = 0;

    //make connection
    include "../connection.php";

    // count total 
    $customer_count = "SELECT COUNT(*) as total_cust FROM customer";
    $result = $conn->query($customer_count);

    while($row = $result->fetch_assoc())
    {
        $total_customers = $row["total_cust"];
    }

    //calculate total amount in paid bills
    $paid_bills = "SELECT SUM(user_total) as total_paid FROM bill WHERE paid = 'yes'";
    $result = $conn->query($paid_bills);

    while($row = $result->fetch_assoc())
    {
        $total_paid_bills = $row["total_paid"];
    }

    //calculate total amount in unpaid bills
    $unpaid_bills = "SELECT SUM(user_total) as total_unpaid FROM bill WHERE paid = 'no'";
    $result = $conn->query($unpaid_bills);

    while($row = $result->fetch_assoc())
    {
        $total_unpaid_bills = $row["total_unpaid"];
    }


    //most used powerplan
    $trending_power_plan = "SELECT power_plan, COUNT(power_plan) AS occurence FROM bill GROUP BY power_plan ORDER BY  occurence DESC LIMIT 1; ";
    $result = $conn->query($trending_power_plan);

    while($row = $result->fetch_assoc())
    {
        $most_used_powerplan = $row["power_plan"];
    }

    //close connection
    $conn->close();
?>

