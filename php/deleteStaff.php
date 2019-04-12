<?php
        
        
    include("dbconnection.php");
  
    $staff_id = $_GET['staff_id'];
    $query = "DELETE from staff WHERE staff_id='$staff_id'";
    $runquery = mysqli_query($connection, $query);

    if ($runquery) {
        echo "Successfully deleted Staff.";
    } else {
        echo "Could not delete staff.";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
</head>
<body>
       <br>
        <a href="searchStaff.php"> Go to Staff Table </a>
 
</body>
</html>