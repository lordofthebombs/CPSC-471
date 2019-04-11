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


<form method = "post" action = "">
    
    <?php while($row = mysqli_fetch_array($updatedForm)): ?>
   Species Id: <input type = "text" name = "speciesid" value ="<?php echo $row['species_id'];?>" >
   <br>
   Animal Age: <input type = "text" name = "animalAge" value ="<?php echo $row['age'];?>">
   <br>
   Animal Name: <input type = "text" name = "animalName" value ="<?php echo $row['name'];?>">
   <br>
   Neutered: <input type = "text" name = "operation" value ="<?php echo $row['neutered'];?>">
   <br>
   Declawed: <input type = "text" name = "declaw" value ="<?php echo $row['declawed'];?>">
    <?php  endwhile;?> 
    <input type = "submit" class = "btn" name = "submitBtn">

    <a href="animalTableSearch.php"> Go to Animal Table </a>
</form>

<?php

//includes the connection opening
    include('dbconnection.php');

   if(isset($_POST['submitBtn']))
    {
        //raw data not cleaned
        $raw_speciesid = $_POST['speciesid'];
        $raw_age = $_POST['animalAge'];
        $raw_animalName=$_POST['animalName'];
        $raw_neuter =$_POST['operation'];
        $raw_declaw =$_POST['declaw'];
        $query = "UPDATE animal SET species_id = '$raw_speciesid', age = '$raw_age', name = '$raw_animalName', neutered = '$raw_neuter', declawed = '$raw_declaw' WHERE id_number = '$id_number'";
        $run_query = mysqli_query($connection, $query);
        
        if ($run_query) {
            echo "Animal updated.";
        } else {
            echo "Animal could not be updated.";
        }
    
    }
