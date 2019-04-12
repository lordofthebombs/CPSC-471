<!DOCTYPE html>
<html lang="en">
<head>
  <title>Branch <Entry></Entry></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enter Branch</h2>
  <form class="form-horizontal" method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Phone Number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Phone Number" name="phoneNum">
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
        <input type="text" class="form-control" placeholder="Enter City" name="city">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Province</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Province" name="province">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Country</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Country" name="country">
      </div>
    </div>
 

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="adoptionCentreLanding.php"> Go to Landing Page </a>
      </div>
    </div>
  </form>
</div>

</body>
</html>
   
<?php
//takes text from dbconnection.php and copies it into this file
include('dbconnection.php');

//checks to see if request was POST or GET
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phoneNum = $_POST['phoneNum'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    
    if (empty($phoneNum) || empty($street) || empty($city) || empty($province)|| empty($country)){
    echo "Please fill out branch information";
} else {

    $addBranch = "INSERT INTO adoption_branch (branch_id, phone_number, province, city, street, country)
    VALUES ('NULL', '$phoneNum', '$province', '$city', '$street', '$country')";

    $runaddBranch = mysqli_query($connection, $addBranch);

    if($runaddBranch){
        echo "<br>Branch added to records";
    }
    else {
        echo "<br> ERROR: Branch not added";
    }
}
}



mysqli_close($connection);

?>
