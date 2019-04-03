<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
  Staff ID: <input type = "number" name = "staffID" placeholder = "Enter staff ID.">
  <br>
  Access pass: <input type = "number" name = "accessPass" placeholder = "Enter acess pass.">
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
      $staffID = $_POST['staffID'];
      $accessPass = $_POST['accessPass'];
      $fName = $_POST['fName'];
      $lName = $_POST['lName'];
      $staffType = $_POST['staffType'];
  }

  if (empty($staffID) || empty($accessPass) || empty($fName) || empty($lName) || empty($staffType)) {
      echo "Please enter all the fields";
  }
  else {
      // Query that adds all this information into the staff table
      $query = "INSERT INTO staff (staff_id, access_pass, first_name, last_name, staff_type)
      VALUES ($staffID, $accessPass, '$fName', '$lName', '$staffType')";

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
