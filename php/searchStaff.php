<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Staff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $branchID = $_POST["branchID"];
    }
    include('dbconnection.php');
    // Checks to see if all fields are empty and if so return all employees
    if (empty($fName) && empty($lName) && empty($branchID)) {
        $query = "SELECT first_name, last_name, s.staff_id, branch_id FROM staff AS s, works_at AS w
        WHERE s.staff_id = w.staff_id";
    }
    // If a branch number is specified, show relevant staff
    elseif (!empty($branchID)) {
        $query = "SELECT first_name, last_name, s.staff_id,branch_id FROM staff AS s, works_at AS w
        WHERE s.first_name LIKE '$fName%' AND s.last_name LIKE '$lName%' AND w.branch_id = $branchID AND s.staff_id = w.staff_id ";
    }
    else {
        $query = "SELECT first_name, last_name, s.staff_id, branch_id FROM staff AS s, works_at AS w
        WHERE s.first_name LIKE '$fName%' AND s.last_name LIKE '$lName%' AND s.staff_id = w.staff_id";
    }
    $queryResult = mysqli_query($connection, $query);
?>


<div class = "container">
    <h2>Staff Table</h2>
      <a href = "addStaff.php"> Go back to Staff Entry </a>
      <br>
      <a href = "adoptionCentreLanding.php"> Go to Landing Page</a>
<!-- These will be the inputs that the user will enter and search for an staff member
by terms that they entered in -->
<form method = "post" action = "<?php echo $_SERVER["PHP_SELF"];?>">
First name: <input type = "text" name = "fName">
Last name: <input type = "text" name = "lName">
Branch ID: <input type = "number" name = "branchID">
<input type = "submit" value = "Search">




<table class = "table table-bordered table table-hover">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Staff ID</th>
        <th>Branch ID</th>
        <th> Edit</th>
        <th> Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_array($queryResult)) { ?>
    <tr>
        <td><?php echo $row['first_name'];?></td>
        <td><?php echo $row['last_name'];?></td>
        <td><?php echo $row['staff_id'];?></td>
        <td><?php echo $row['branch_id'];?></td>
        <td><a class = "btn btn-primary" href="updateStaff.php?staff_id=<?php echo $row['staff_id'] ?>"> Edit</a></td>
        <td><a class = "btn btn-danger" href="deleteStaff.php?staff_id=<?php echo $row['staff_id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>  <!-- End of php while loop -->
    </tbody>
</table>
</form>
</div>

</body>
</html>
