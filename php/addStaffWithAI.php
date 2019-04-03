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

<?php
  // Connecting to database
  include('dbconnection.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $branchID = $_POST['branchID'];
      $fName = $_POST['fName'];
      $lName = $_POST['lName'];
      $staffType = $_POST['staffType'];
  }

  if (empty($branchID) || empty($fName) || empty($lName) || empty($staffType)) {
      echo "Please enter all the fields";
  }
  else {
      // Query that adds all this information into the staff table
      $query = "INSERT INTO staff (NULL, branch_id, first_name, last_name, staff_type)
      VALUES (NULL, '$fName', '$lName', '$staffType')";

      $runQuery = mysqli_query($connection, $query);

      if($runQuery) {
          echo "<br>Staff added to records";
      }
      else {
          echo "<br>ERROR: Staff not added";
      }
  }



  mysqli_close($connection);
?>
