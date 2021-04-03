<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="POST" action="" class="addform">
        <label for="FirstName"> First Name:</label>
        <input type="text" name="FirstName" value="<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName'];?>">
        <br/> <br/>
        <label for="LastName"> Last Name:</label>
        <input type="text" name="LastName" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName'];?>">
        <br/> <br/>
        <label for="email"> Email:</label>
        <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
        <br/> <br/>
        <label for="pass"> Password:</label>
        <input type="password" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass'];?>">
        <br/> <br/>
        <label for="gender"> Gender:</label>
        <select id="gender" name="gender">
          <option value="M">Male</option>
          <option value="F">Female</option>
          <option value="LGBTQ">LGBTQ</option>
        </select>
        <br/> <br/>
        <label for="age"> Age:</label>
        <input type="number" name="age" value="<?php if(isset($_POST['age'])) echo $_POST['age'];?>">
        <br/> <br/>
        <input type="submit" value="SUBMIT" name = "mysqlbut">
    </form>

    <?php include 'insertRecord.php'; ?>
</body>
</html>


