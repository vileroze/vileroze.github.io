<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DAY 5</title>
  </head>
  <body>
    <?php include 'connection.php' ?>
    
    <div class="bill container">
      <div class="row mb-5">
        <div class="col">
          <div  class="text-center">
            <img src="electric-tarif.jpg">
          </div>
          
          <h1>Bill Calculator:</h1>
          <p class="text-muted">NOTE: Pressing the SUBMIT button will insert data into database</p>
          
          <form action="insert.php" method="post">
            <input type="text" id="user_name" placeholder="Enter your name " class="form-control mb-2">

            <input type="number" id="house_number" placeholder="Enter your house number " class="form-control mb-2" min="0" step="1" oninput="validity.valid||(value='');">

            <label for="sel1" class="form-label">Select your power plan (in Amperes)</label>
            <select class="form-select mb-2" id="power" name="sellist1">
              <option>5</option>
              <option>15</option>
              <option>30</option>
              <option>60</option>
            </select>

            <input type="text" id="units" placeholder="Enter your units: " class="form-control" oninput="validate()">
            <p id="err_msg" class="text-danger mb-2"></p>

            <button class="btn btn-success disabled" type="button" id="button-submit" onclick="billCalc()">SUBMIT</button>

          </form>
          
          <!-- displays any errors found -->
          <p id="bill-result"></p>
        </div>
      </div>
    </div>

    <!-- Custom script -->
    <script src="day4.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>