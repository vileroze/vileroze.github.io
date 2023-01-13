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

    <!-- paypal script and merchant id -->
    <script src="https://www.paypal.com/sdk/js?client-id=AS8ofe598s_1Jh25t0Ec-EUiEp-XSen_YijtDs_0QeEFQaqv4uN2RjPP0Fno9oPnnoOD3wi9pvv3FXVI&merchant-id=AG5HE495MBY7N&locale=en_NP"></script>

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
          
          <h4 class="text-decoration-underline">Bill Calculator</h4>
          <div class="d-flex bd-highlight">
            
            <!-- user greeting with basic info -->
            <div class="p-2 flex-grow-1 bd-highlight">
              <p class="text-muted"> 
                <strong>Hello <?php echo $_SESSION['user_name'] ?></strong>, pressing the SUBMIT button will add a new record
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

          <form id="addNewBill" method="POST">
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
            <input type="text" id="units" name="units" onfocusout="billCalc();" value="<?php echo isset($_POST['units']) ? $_POST['units'] : '' ?>"  placeholder="Enter your units: " class="form-control" oninput="validate()">
            <p id="err_msg" class="text-danger mb-2"></p>

            <!-- displays bill total -->
            <label for="bill_total" class="form-label">Total</label>
            <input type="text" name="bill_total" id="bill_total"  value="<?php echo isset($_POST['bill_total']) ? $_POST['bill_total'] : '' ?>" placeholder="Your total will appear here" class="form-control mb-2 border-success" readonly>
            
            <!-- submit button -->
            <button class="btn btn-success w-25 disabled mt-3" type="submit" id="button-submit" name="bill-submit">PAY LATER</button>
          
          </form>

          <!-- Custom script -->
          <script src="bill-calc.js"></script>

          <!-- action to be performed after form submission -->
          <?php include "addBill.php"; ?>

          <!--Modal -->
          <button class="btn btn-success w-25 mt-3 disabled" id="pay_now" data-bs-toggle="modal" data-bs-target="#staticBackdrop">PAY NOW</button>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Choose a payment option</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div id="paypal-button-container" ></div>
                  <script>
                    paypal.Buttons({
                      style: {
                        layout: 'vertical',
                        color:  'gold',
                        shape:  'rect',
                        label:  'paypal'
                      },
                      // Sets up the transaction when a payment button is clicked
                      createOrder: function(data, actions) {
                        return actions.order.create({
                          purchase_units: [{
                            amount: {
                              value: gross_total// Can reference variables or functions. Example: `value: document.getElementById('...').value`
                            }
                          }]
                        });
                      },

                      // Finalize the transaction after payer approval
                      onApprove: function(data, actions) {
                        return actions.order.capture().then(function(orderData) {
                          // When ready to go live, remove the alert and show a success message within this page. For example:
                          var paypalBtn = document.getElementById('paypal-button-container');
                          let submit_btn = document.getElementById("button-submit");
                          
                          //display message
                          paypalBtn.innerHTML = '';
                          paypalBtn.innerHTML = '<h3 class="text-success">Thank you for your payment!</h3>';
                          
                          //click the submit button
                          submit_btn.click();
                          //disable submit button
                          submit_btn.classList.add('disabled');
                          <?php //insertNewBill(); ?>
                          // Or go to another URL:  actions.redirect('thank_you.html');
                        });
                      }
                    }).render('#paypal-button-container');
                  </script>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col mb-5">
          <h4 class="text-decoration-underline mb-3">Bill History</h4>
          <div class="input-group mb-3">
            <form method="POST" >
              <div class="input-group mb-3">
                <input type="date" id="date_filter" name="date_filter" class="form-control" aria-label="bill to filter date" required>
                <button class="btn btn-info" id="filter_bill" name="filter_bill">Filter</button>
              </div>
            </form>
          </div>
          <?php 
            include 'customer_bills.php';
          ?>
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>