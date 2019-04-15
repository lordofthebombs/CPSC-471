<!--

<?php
    session_start();
    $_SESSION['getID'] = $_GET['id_number'];
?>
-->

<?php

    include("dbconnection.php");
  
    //$id_number = $_SESSION['getID'];
    $id_number = $_GET['id_number'];
    $query = "SELECT * FROM animal WHERE id_number='$id_number'";
    
    $updatedForm = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Animal <Entry></Entry></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enter Animal</h2>
  <form class="form-horizontal" method = "post" action="">
 
     <?php while($row = mysqli_fetch_array($updatedForm)): ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Animal Age:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name = "animalAge" value ="<?php echo $row['age'];?>">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Animal Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name = "animalName" value ="<?php echo $row['name'];?>">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Neutered:</label>
      <div class="col-sm-10">          
        <input type="checkbox" value = "y" class="checkbox-inline" name="operation" value = "y">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Declawed:</label>
      <div class="col-sm-10">          
        <input type="checkbox" class="checkbox-inline" name="declaw" value ="y">
      </div>
    <?php  endwhile;?> 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="animalTableSearch.php"> Go to Animal Table </a>
        <a href="adoptionCentreLanding.php"> Go to Landing Page</a>
      </div>
    </div>
  </form>
</div>

</body>
</html>


<?php

//includes the connection opening
    include('dbconnection.php');

  if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //raw data not cleaned
        $raw_age = $_POST['animalAge'];
        $raw_animalName=$_POST['animalName'];
       
       
        if (empty($_POST['operation']))
            $raw_neuter = "n";
        else
            $raw_neuter =$_POST['operation'];
        
        if (empty($_POST['declaw']))
            $raw_declaw = "n";
        else
            $raw_declaw = $_POST['declaw'];
       
        $query = "UPDATE animal SET age = '$raw_age', name = '$raw_animalName', neutered = '$raw_neuter', declawed = '$raw_declaw' WHERE id_number = '$id_number'";
        $run_query = mysqli_query($connection, $query);
        
        if ($run_query) {
            echo "Animal updated.";
        } else {
            echo "Animal could not be updated.";
        }
    
    }
