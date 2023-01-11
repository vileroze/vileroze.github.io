<?php
    if (isset($_POST['bill-submit'])) {
        // require_once("wp-load.php");
        
        //make connection
        include "connection.php";

        // Taking all 4 values from the form data(input)
        $house_number = $_POST['house_number'];
        $power = $_POST['power'];
        $units = $_POST['units'];
        $total_calc = $_POST['bill_total'];
        $index = strpos($total_calc, "=");
        $total_calc_sbstr = substr($total_calc, $index + strlen('='));
        $total = str_replace("Rs.","", $total_calc_sbstr);

        
        $curr_date = date("Y-m-d");

        // insert bill query
        $sql = "INSERT INTO bill VALUES ($house_number, $power, $units, $total, '$total_calc', '$curr_date', 'yes' )";

        if(mysqli_query($conn, $sql)){
            echo "<h5 class='text-success mt-3'><strong>".$_SESSION['user_name']."</strong>, your bill has been added, please check your email for your receipt</h5>";

            $query = "SELECT user_email FROM customer WHERE house_no =  $house_number";
            $result = $conn->query($query);
            
            $to="";

            while($row = $result->fetch_assoc())
            {
                $to = $row["user_email"];
            }


            $fromName = 'Electricity Authority'; 
            $from = 'ea@gov.com.np';
            
            $subject = "Your bill for [ ".$curr_date." ]"; 
            
            $htmlContent = ' 
                            <html> 
                            <head> 
                                <title>Bill calculator</title> 
                            </head> 
                            <body> 
                                <p>Power volume: '.$power.'</p><br>
                                <p>Total units consumed: '.$units.'</p><br>
                                <p>'.$total_calc.'</p><br>
                            </body> 
                            </html>
                        '; 
            
            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            
            // Additional headers 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
            
            // Send email 
            if(mail($to, $subject, $htmlContent, $headers)){ 
                // echo 'Email has sent successfully.'; 
            }else{ 
                echo 'Email sending failed.'; 
            }
            
        } else{
            echo "ERROR: Sorry $sql. ". mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
    }
?>

