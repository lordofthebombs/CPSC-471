<?php

    include("dbconnection.php");
    //$id_number = $_SESSION['getID'];
    $clinic_id = $_GET['clinic_id'];
    $query = "SELECT * FROM vet_clinic WHERE clinic_id='$clinic_id'";
    
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
      <label class="control-label col-sm-2" for="pwd">Clinic Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value=<?php echo $row['clinic_name']?> name="name">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone Number:</label>
      <div class="col-sm-10">          
        <input type="text"  class="form-control" value=<?php echo $row['phone_number']?> name="phoneNumber">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Street:</label>
      <div class="col-sm-10">          
        <input type="text"  class="form-control" value=<?php echo $row['street']?> name="street">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter City:</label>
      <div class="col-sm-10">          
        <input type="text"  class="form-control" value=<?php echo $row['city']?> name="city">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Province:</label>
      <div class="col-sm-10">          
        <input type="text"  class="form-control" value=<?php echo $row['province']?> name="province">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter Country:</label>
      <div class="col-sm-10">          
        <input type="text"  class="form-control" value=<?php echo $row['country']?> name="country">
      </div>
    </div> 
        <?php  endwhile;?> 

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
    <input type = "submit" class = "btn" name = "submitBtn">
        <a href="ViewClinic.php"> Go to Vet Table </a>    
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
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $street= $_POST['street'];
        $city= $_POST['city'];
        $province= $_POST['province'];
        $country= $_POST['country'];

 
        $query = "UPDATE vet_clinic SET clinic_name = '$name', phone_number = '$phoneNumber', street = '$street', city = '$city', province = '$province', country = '$country' WHERE clinic_id = '$clinic_id'";
        $run_query = mysqli_query($connection, $query);
        
        if ($run_query) {
            echo "Clinic Updated.";
        } else {
            echo "Clinic could not be updated.";
        }
    
    }
?>