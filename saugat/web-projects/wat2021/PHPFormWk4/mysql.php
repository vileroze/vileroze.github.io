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
    <form method="POST" action="insertRecord.php" class="addform">
        <label for="FirstName"> First Name:</label>
        <input type="text" name="FirstName">
        <br/> <br/>
        <label for="LastName"> Last Name:</label>
        <input type="text" name="LastName">
        <br/> <br/>
        <label for="email"> Email:</label>
        <input type="email" name="email">
        <br/> <br/>
        <label for="pass"> Password:</label>
        <input type="password" name="pass">
        <br/> <br/>
        <label for="gender"> Gender:</label>
        <select id="gender" name="gender">
          <option value="M">Male</option>
          <option value="F">Female</option>
          <option value="LGBTQ">LGBTQ</option>
        </select>
        <br/> <br/>
        <label for="age"> Age:</label>
        <input type="number" name="age">
        <br/> <br/>
        <button type="submit" name="btn">Submit</button>
    </form>

    <?php
        include './mysql/Connection.php';

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
    ?>
    </div>
    <a href="../watIndex.html">HOME</a>
</body>
</html>
