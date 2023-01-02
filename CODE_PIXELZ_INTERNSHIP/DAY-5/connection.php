<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "internship";
    // // Create connection
    // $conn = mysqli_connect($servername, $username, $password,$db);
    // // Check connection
    // if (!$conn) {
    // die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";
?>

<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "internship";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: "
            . $conn->connect_error);
    }
    
    $sqlquery = "INSERT INTO bill_calculator VALUES
        ('John', 23, 5, 10)";
    
    if ($conn->query($sqlquery) === TRUE) {
        echo "record inserted successfully";
    } else {
        echo "Error: " . $sqlquery . "<br>" . $conn->error;
    }

?>