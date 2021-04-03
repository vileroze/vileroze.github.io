<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


    <div class="main">
    <h1>My SQL</h1>

   <?php
        include './mysql/Connection.php';
        include 'insertRecordForm.php';

        if (isset($_SESSION['errorMsg'])) {
            echo $_SESSION['errorMsg'];
            unset($_SESSION['errorMsg']);
        }elseif (isset($_SESSION['successMsg'])){
            echo $_SESSION['successMsg'];
            unset($_SESSION['successMsg']);
        }
   ?>


    <?php
        if($connection){
            $query = "SELECT * FROM customer";
            $customer_info = mysqli_query($connection,$query);

            echo "<ol>";
            foreach ($customer_info as $info) {
                $id = $info["CustomerId"];

                echo "<li> $info[FirstName]||||$info[LastName]||||$info[Email]||||$info[Password]||||$info[Gender]||||$info[Age]";

                // delete button form
                echo "<form method='POST' action='deleteRecord.php?cId=$id' class = 'btnform1'>";
                echo "<input type = 'image' src='delete.png' width = '34px' height = '34px' title = 'delete' name = 'del$id'> ";
                echo "</form>";
                echo "</li>";

                // update button form
                echo "<form method='POST' action='updateRecord.php?cId=$id' class='btnform2'>";
                echo "<input type = 'image' src='edit.png' width = '34px' height = '34px' title = 'edit' name='up$id'/>";
                echo "</form>";
                echo "</li> <br><br>";
            }
            echo "</ol>";
        }else{
            echo "<br/> DB connection failure";
        }
        echo "<br/> <br/>";
        include 'selectRecord.php';
    ?>

    </div>
    <a href="../index.html">HOME</a>
</body>
</html>
