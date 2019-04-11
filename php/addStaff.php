<!-- This works, but you need to have an instance of adoption branch that already has an admin -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Staff <Entry></Entry></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enter Adoption Centre Staff </h2>
  <form class="form-horizontal" method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   
   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Branch ID:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Branch ID" name="branchID">
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter First name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter First name" name="fName">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Last name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Last name" name="lName">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Staff Type:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Staff Type" name="staffType">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="searchStaff.php"> Go to Staff Table </a>    
        <a href="adoptionCentreLanding.php"> Go to Landing Page </a>    

      </div>
    </div>
  </form>
</div>

</body>
</html>
   





<!--

<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
  Branch ID: <input type = "number" name = "branchID" placeholder = "Enter branch ID.">
  <br>
  First name: <input type = "text" name = "fName" placeholder = "Enter first name.">
  <br>
  Last name: <input type = "text" name = "lName" placeholder = "Enter last name.">
  <br>
  Staff type: <input type = "text" name = "staffType" placeholder = "Enter staff type.">
  <br>
  <input type = "submit" class = "btn">

 </form>
-->

<?php
  // Connecting to database
  include('dbconnection.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
      $branchID = $_POST['branchID'];
      $fName = $_POST['fName'];
      $lName = $_POST['lName'];
      $staffType = $_POST['staffType'];
      
    if (empty($branchID) || empty($fName) || empty($lName) || empty($staffType)) {
      echo " Please enter all the fields.";
    } else {
      // Query that adds all this information into the staff table
      $query = "INSERT INTO staff (staff_id, first_name, last_name, staff_type)
      VALUES (NULL, '$fName', '$lName', '$staffType')";

      $runQuery = mysqli_query($connection, $query);

      if($runQuery) {
          echo "<br>Staff added to staff table.";
      }
      else {
          echo "<br>ERROR: Staff not added to staff table.";
      }

      // Get the most recently added in ID for staff and add it into works_at
      $lastID = mysqli_insert_id($connection);
      $query2 = "INSERT INTO works_at (branch_id, staff_id) VALUES ($branchID, $lastID)";

      $runQuery = mysqli_query($connection, $query2);

      if($runQuery) {
          echo "<br>Staff added to works_at table.";
      }
      else {
          echo "<br>ERROR: Staff not added to works_at table.";
      }
  }
  }



  mysqli_close($connection);
?>
