<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LOGIN</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row mb-5 justify-content-center text-center">
        <div class="col-4">

          <h3 class="mb-3">CUSTOMER LOGIN</h3>
          <form method="POST">
            <!-- customer name -->
            <input type="number" name="login_house_number" id="login_house_number" value="<?php echo isset($_POST['login_house_number']) ? $_POST['login_house_number'] : '' ?>"  placeholder="Enter your house number " class="form-control mb-2" min="0" step="1" oninput="validity.valid||(value='');">
            
            <!-- customer password -->
            <input type="password" name="login_user_password" id="login_user_password" class="form-control mb-2" placeholder="enter your password">
            
            <!-- submit button -->
            <button class="btn btn-success"id="button-submit" name="validate_customer">LOGIN</button>
          </form>

          <!-- action to be performed after form submission -->
          <?php include "validate_login.php"; ?>

          <h3 class="mt-5 mb-3">SIGNUP</h3>
          <form method="POST">
            <!-- customer name -->
            <input type="text" name="new_user_name" id="new_user_name" value="<?php echo isset($_POST['new_user_name']) ? $_POST['new_user_name'] : '' ?>"  placeholder="Enter your name " class="form-control mb-2">
            
            <!-- house number -->
            <input type="number" name="house_number" id="house_number" value="<?php echo isset($_POST['house_number']) ? $_POST['house_number'] : '' ?>"  placeholder="Enter your house number " class="form-control mb-2" min="0" step="1" oninput="validity.valid||(value='');">

            <!-- customer email -->
            <input type="email" name="user_email" id="user_email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email'] : ''?>" class="form-control mb-2" placeholder="Enter your email" >

            <!-- customer password -->
            <input type="password" name="user_password" id="user_password" class="form-control mb-2" placeholder="Enter your password">

            <!-- submit button -->
            <button class="btn btn-primary" id="add-customer" name="add_customer">SIGN UP</button>
          </form>

          <!-- action to be performed after form submission -->
          <?php include "validate_signup.php"; ?>

          <h3 class="mb-3 mt-5">ADMIN LOGIN</h3>
          <form method="POST">
            <!-- admin name -->
            <input type="text" name="admin_username" id="admin_username" value="<?php echo isset($_POST['admin_username']) ? $_POST['admin_username'] : '' ?>"  placeholder="Enter user name " class="form-control mb-2" >
            
            <!-- admin password -->
            <input type="password" name="admin_password" id="admin_password" class="form-control mb-2" placeholder="enter your password">
            
            <!-- submit button -->
            <button class="btn btn-success"id="button-submit" name="admin_validation">LOGIN</button>
          </form>

          <!-- action to be performed after form submission -->
          <?php include "../admin/validate_admin.php"; ?>

        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>