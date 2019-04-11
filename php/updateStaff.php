<?php

    include("dbconnection.php");
    //$id_number = $_SESSION['getID'];
    $staff_id = $_GET['staff_id'];
    $query = "SELECT * FROM staff WHERE staff_id='$staff_id'";
    
    $updatedForm = mysqli_query($connection, $query);
?>

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
  <h2>Edit <Staff></Staff> </h2>
  <form class="form-horizontal" method = "post" action="">
    <?php while($row = mysqli_fetch_array($updatedForm)): ?>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter First name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  value=<?php echo $row['first_name']?> name="fName">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Last name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value=<?php echo $row['last_name']?> name="lName">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Staff Type:</label>
      <div class="col-sm-10">          
        <input type="text"  class="form-control" value=<?php echo $row['staff_type']?> name="staffType">
      </div>
    </div>
        <?php  endwhile;?> 

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
    <input type = "submit" class = "btn" name = "submitBtn">
        <a href="searchStaff.php"> Go to Staff Table </a>    
        <a href="adoptionCentreLanding.php"> Go to Landing Page </a>    

      </div>
    </div>
  </form>
</div>

</body>
</html>


<?php

//includes the connection opening
    include('dbconnection.php');

   if(isset($_POST['submitBtn']))
    {
        //raw data not cleaned
        $first_name = $_POST['fName'];
        $last_name = $_POST['lName'];
        $staff_type= $_POST['staffType'];
      
        $query = "UPDATE staff SET first_name = '$first_name', last_name = '$last_name', staff_type = '$staff_type' WHERE staff_id = '$staff_id'";
        $run_query = mysqli_query($connection, $query);
        
        if ($run_query) {
            echo "Staff updated.";
        } else {
            echo "Staff could not be updated.";
        }
    
    }
?>