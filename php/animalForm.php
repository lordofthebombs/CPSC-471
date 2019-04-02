
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">

   Species Id: <input type = "text" name = "species" placeholder="Enter Species ID.">
   <br>
   Animal Age: <input type = "text" name = "animalAge" placeholder="Enter Animal Age">
   <br>
   Animal Name: <input type = "text" name = "animalName" placeholder="Enter Animal Name">
   <br>
   Neutered: <input type = "text" name = "operation" placeholder="Enter Animal Operation">
   <br>
   Declawed: <input type = "text" name = "declaw" placeholder="Enter Animal Declaw Status">
   
 <input type = "submit" class = "btn">
    <a href="animalTable.php"> Go to Animal Table </a>
</form>


<?php
    include('dbconnection.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $raw_speciesid = $_POST['species'];
        $raw_age = $_POST['animalAge'];
        $raw_animalName=$_POST['animalName'];
        $raw_neuter =$_POST['operation'];
        $raw_declaw =$_POST['declaw'];
            
        
        if(empty($raw_speciesid) &&
           empty($raw_age) &&
           empty($raw_animalName) &&
           empty($raw_neuter) &&
           empty($raw_declaw)) {
            
            echo "Please enter full information";
        }
        else
        {
           $query = "INSERT INTO animal (id_number, species_id, age, name, neutered, declawed) VALUES ('NULL','$raw_speciesid','$raw_age','$raw_animalName','$raw_neuter','$raw_declaw')"; 

            $run_query = mysqli_query($connection, $query);
            
            if ($run_query){
                echo "<br>Record added.";
            } else {
                echo "<br>Record not added.";
            }
        }
    }
    mysqli_close($connection);

?>
