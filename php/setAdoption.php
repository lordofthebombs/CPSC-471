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
      <label class="control-label col-sm-2" for="email">Client ID:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Client ID" name="client_id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Animal ID:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Animal ID" name="animal_id">
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
    $client_id = $_POST['client_id'];
    $animal_id = $_POST['animal_id'];
   
    
    if (empty($client_id) || empty($animal_id) ){
    echo "Please fill out required fields.";
} else {

    $query = "INSERT INTO adoption (adoption_id, adopter, adoptee) VALUES ('NULL', '$client_id', '$animal_id')";

    $addAdoption = mysqli_query($connection, $query);

    if($addAdoption){
        echo "<br>Adoption added";
    }
    else {
        echo "<br> ERROR: Adoption not added";
    }
}
}



mysqli_close($connection);

?>