<?php

    include("dbconnection.php");
    //$id_number = $_SESSION['getID'];
    $client_id = $_GET['client_id'];
    $query = "SELECT * FROM client WHERE client_id='$client_id'";
    
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
  <h2>Enter Clients </h2>
  <form class="form-horizontal" method = "post" action="">
     <?php while($row = mysqli_fetch_array($updatedForm)): ?>

   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Email:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value = <?php echo $row['email']?> name="email">
      </div>
    </div>
           
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Street:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value =<?php echo $row['street']?>  name="street">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">City:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value = <?php echo $row['city']?> name="city">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Province:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value = <?php echo $row['province']?> name="province">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Country:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value =<?php echo $row['country']?> name="country">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone Number:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value = <?php echo $row['phone_number']?> name="phoneNumber">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">First Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value =<?php echo $row['first_name']?> name="firstName">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Last Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value =<?php echo $row['last_name']?> name="lastName">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Age:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value =<?php echo $row['age']?> name="age">
      </div>
    </div>
    <?php  endwhile;?> 

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
    <input type = "submit" class = "btn" name = "submitBtn">
        <a href="searchClient.php"> Go to Client Table </a>    
        <a href="adoptionCentreLanding.php"> Go to Landing Page </a>    

      </div>
    </div>
          
    
  </form>
</div>



<?php

//includes the connection opening
    include('dbconnection.php');

   if(isset($_POST['submitBtn']))
    {
      //raw data not cleaned
      $email = $_POST['email'];
      $street = $_POST['street'];
      $city = $_POST['city'];
      $province = $_POST['province'];
      $country = $_POST['country'];
      $phoneNumber = $_POST['phoneNumber'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $age = $_POST['age'];
        
        $query = "UPDATE client SET email = '$email', street = '$street', city = '$city', province = '$province', country = '$country', phone_number= '$phoneNumber', first_name = '$firstName', last_name = '$lastName', age = '$age' WHERE client_id = '$client_id'";
        $run_query = mysqli_query($connection, $query);
        
        if ($run_query) {
            echo "Client Updated.";
        } else {
            echo "Client could not be updated.";
        }
    
    }
?>