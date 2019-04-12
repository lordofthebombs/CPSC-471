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
  <h2>Enter Vet Clinic </h2>
  <form class="form-horizontal" method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   
   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Email:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Clinic Name" name="name">
      </div>
    </div>
           
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone Number:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Street:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Street" name="street">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">City:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="City" name="city">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Province:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Province" name="province">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Country:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Country" name="country">
      </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="viewClinic.php"> Go to Vet Table </a>    
        <a href="adoptionCentreLanding.php"> Go to Landing Page </a>    

      </div>
    </div>
  </form>
</div>

</body>
</html>
   

<?php
  // Connecting to database
  include('dbconnection.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
      $name = $_POST['name'];
      $phoneNumber = $_POST['phone_number'];
      $street = $_POST['street'];
      $city = $_POST['city'];
      $province = $_POST['province'];
      $country = $_POST['country'];
  
      

      
    if (empty($name) || empty($street) || empty($city) || empty($province) || empty($country)|| empty($phoneNumber)) {
      echo " Please enter all the fields.";
    } else {
      // Query that adds all this information into the staff table
      $query = "INSERT INTO vet_clinic (clinic_id, clinic_name, phone_number, street, city, province, country)
      VALUES ('NULL', '$name','$phoneNumber', '$street', '$city', '$province', '$country')";

      $runQuery = mysqli_query($connection, $query);

      if($runQuery) {
          echo "<br> Vet Clinic added to Vet table.";
      }
      else {
          echo "<br>ERROR: Vet Clinic not added to staff table.";
      }


    }
  }



  mysqli_close($connection);
?>
