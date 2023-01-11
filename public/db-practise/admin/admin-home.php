<?php 
  session_start();
  if(!isset($_SESSION['admin_user']) || empty($_SESSION['admin_user']) || $_SESSION['admin_user'] == ''){
    header("Location: ../validate-customer/customer_login.php");
  }
?>

<?php include 'admin_dashboard.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>ADMIN</title>
</head>
<body> 

    <div class="container mt-5">
        <h3 class="mb-5 text-center">ADMIN DASHBOARD</h3>
        <div class="row justify-content-end mt-5 mb-5">
            <div class="col-1">
                <a class=" btn btn-danger" href="admin_logout.php">LOGOUT</a>
            </div>
        </div>

        <h3 class="mb-3 mt-3 ps-5 text-decoration-underline">General information</h3>
        <div class="row justify-content-center text-center">
            
            <div class="col-3 text-center ps-5">
                <div style="border-radius:50%; background-color:aquamarine; width:12rem; height:12rem;">
                    <h1 class="pt-4 pb-2" id="total_customers" style="font-size: 4.5rem;"><?php echo $total_customers; ?></h1>
                    <h6>Total customers</h5>
                </div>
            </div>

            <div class="col-3 text-center ps-5">
                <div style="border-radius:50%; background-color:aquamarine; width:12rem; height:12rem;">
                    <h1 class="pt-5 pb-2 pb-3" id="total_paid" style="font-size: 3rem;"><?php echo $total_paid_bills; ?></h1>
                    <h6>Total paid bills <br>(Rs.)</h5>
                </div>
            </div>

            <div class="col-3 text-center ps-5">
                <div style="border-radius:50%; background-color:aquamarine; width:12rem; height:12rem;">
                    <h1 class="pt-4 pb-2" id="total_unpaid" style="font-size: 4rem;"><?php echo $total_unpaid_bills; ?></h1>
                    <h6>Total unpaid bills <br>(Rs.)</h5>
                </div>
            </div>

            <div class="col-3 text-center ps-5">
                <div style="border-radius:50%; background-color:aquamarine; width:12rem; height:12rem;">
                    <h1 class="pt-4 pb-2" id="most_used_power_plan" style="font-size: 4.5rem;"><?php echo $most_used_powerplan; ?></h1>
                    <h6>Most used power plan <br>(Ampere)</h6>
                </div>
            </div>
        </div>

        <h3 class="mb-3 mt-3 ps-5 text-decoration-underline mt-5">All bills</h3>

        <!-- display all bills -->
        <?php include 'admin_viewBills.php' ?>
        
        <!-- check for changes in checkbox status -->
        <script src="admin.js"></script>

        <!-- listen for changes in checkbox state -->
        <?php include 'update_paid_status.php'; ?>

        

    </div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>