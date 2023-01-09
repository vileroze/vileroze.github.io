<?php 
  session_start();
  if(!isset($_SESSION['user_name']) || empty($_SESSION['user_name']) || $_SESSION['user_name'] == ''){
    header("Location: validate-customer/customer_login.php");
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DAY 10</title>
  </head>
  <body>
    <div class="bill container">
      <div class="row mb-5">
        <div class="col">

          <!-- image of bill tariff -->
          <div  class="text-center">
            <img src="electric-tarif.jpg">
          </div>
          
          <h1>Bill Calculator</h1>
          <div class="d-flex bd-highlight">
            
            <!-- user greeting with basic info -->
            <div class="p-2 flex-grow-1 bd-highlight">
              <p class="text-muted"> 
                <strong>Hello <?php echo $_SESSION['user_name'] ?></strong>, Pressing the SUBMIT button will update your information
              </p>
            </div>

            <!-- logout button -->
            <div class="p-2 bd-highlight">
              <a class="text-danger" href="validate-customer/customer_logout.php">LOGOUT</a>
            </div>

            <!--  button to delete account -->
            <div class="p-2 bd-highlight">
              <a class="text-danger" href="validate-customer/customer_delete.php">DELETE ACCOUNT</a>
            </div>
          </div>

          <form method="POST">
            <!-- customer name -->
            <label for="user_name" class="form-label">Name</label>
            <input readonly type="text" name="user_name" id="user_name" value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : $_SESSION['user_name'] ?>"  placeholder="Enter your name " class="form-control mb-2">
            
            <!-- house number -->
            <label for="house_number" class="form-label">House No</label>
            <input readonly type="number" name="house_number" id="house_number" value="<?php echo isset($_POST['house_number']) ? $_POST['house_number'] : $_SESSION['house_no'] ?>"  placeholder="Enter your house number " class="form-control mb-2" min="0" step="1" oninput="validity.valid||(value='');">

            <!-- power plan -->
            <label for="sel1" class="form-label">Select your power plan (in Amperes)</label>
            <select class="form-select mb-2" id="power" name="power" onchange="billCalc(); validate();">
              <option <?php echo (isset($_POST['power']) && $_POST['power'] == 5 ) ? "selected='true'" : '' ?> value="5">5</option>
              <option <?php echo (isset($_POST['power']) && $_POST['power'] == 15 ) ? "selected='true'" : '' ?> value="15">15</option>
              <option <?php echo (isset($_POST['power']) && $_POST['power'] == 30 ) ? "selected='true'" : '' ?> value="30">30</option>
              <option <?php echo (isset($_POST['power']) && $_POST['power'] == 60 ) ? "selected='true'" : '' ?> value="60">60</option>
            </select>

            <!-- total units used -->
            <label for="units" class="form-label">Power Usage</label>
            <input type="text" id="units" name="units" onfocusout="billCalc();" value="<?php echo isset($_POST['units']) ? $_POST['units'] : $_SESSION['power_usage'] ?>"  placeholder="Enter your units: " class="form-control" oninput="validate()">
            <p id="err_msg" class="text-danger mb-2"></p>

            <!-- displays bill total -->
            <label for="bill_total" class="form-label">Total</label>
            <input type="text" name="bill_total" id="bill_total"  value="<?php echo isset($_POST['bill_total']) ? $_POST['bill_total'] : $_SESSION['user_total'] ?>" placeholder="Your total will appear here" class="form-control mb-2 border-success" readonly>
            
            <!-- submit button -->
            <button class="btn btn-success disabled" type="submit" id="button-submit" name="bill-submit">SUBMIT</button>
          </form>

          <!-- Custom script -->
          <script src="bill-calc.js"></script>

          <!-- action to be performed after form submission -->
          <?php include "addEditUser.php"; ?>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col mb-5">
          <h5>ALL CUSTOMER DATA</h5>
          <?php 
              include 'all_customers.php';
            ?>
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>