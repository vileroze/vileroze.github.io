<?php 
  session_start();
  if(!isset($_SESSION['admin_user']) || empty($_SESSION['admin_user']) || $_SESSION['admin_user'] == ''){
    header("Location: ../validate-customer/customer_login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ADMIN</title>
</head>
<body> 

  <div class="container mt-5">
    <div class="row justify-content-center text-center">
    <h3 class="mb-5">ADMIN DASHBOARD</h3>
        <div class="col-3 text-center ps-5">
            <div style="border-radius:50%; background-color:aquamarine; width:9.5rem; height:9.5rem;">
                <h1 class="pt-4 pb-2" id="total_customers">12</h1>
                <h6>Total customers</h5>
            </div>
        </div>

        <div class="col-3 text-center ps-5">
            <div style="border-radius:50%; background-color:aquamarine; width:9.5rem; height:9.5rem;">
                <h1 class="pt-4 pb-2" id="total_paid">12</h1>
                <h6>Total paid bills &nbsp;&nbsp;&nbsp;(Rs.)</h5>
            </div>
        </div>

        <div class="col-3 text-center ps-5">
            <div style="border-radius:50%; background-color:aquamarine; width:9.5rem; height:9.5rem;">
                <h1 class="pt-4 pb-2" id="total_unpaid">12</h1>
                <h6>Total unpaid bills (Rs.)</h5>
            </div>
        </div>

        <div class="col-3 text-center ps-5">
            <div style="border-radius:50%; background-color:aquamarine; width:9.5rem; height:9.5rem;">
                <h1 class="pt-4 pb-2" id="most_used_power_plan">12</h1>
                <h6>Most used power plan</h6>
            </div>
        </div>
    </div>
  </div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>