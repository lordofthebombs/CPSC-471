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
   <br>
   Animal Species: <input type = "text" name = "species" placeholder="Enter Animal species">
   <br>
   Animal Breed: <input type = "text" name = "breed" placeholder="Enter Animal breed">
   <br>
   Adoption Branch: <input type = "text" name = "branch" placeholder="Enter Adoption Branch">

 <input type = "submit" class = "btn">
    <a href="animalTableSearch.php"> Go to Animal Table </a>
</form>


<?php
    //includes the connection opening
    include('dbconnection.php');

    //checks to see if the request method from the form method "post" is the same
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //raw data not cleaned
        $raw_speciesid = $_POST['species'];
        $raw_age = $_POST['animalAge'];
        $raw_animalName=$_POST['animalName'];
        $raw_neuter =$_POST['operation'];
        $raw_declaw =$_POST['declaw'];
        $raw_species = $_POST['species'];
        $raw_breed = $_POST['breed'];
        $raw_branch = $_POST['branch'];

        //checks to see if any fields are blank
        if(empty($raw_speciesid) ||
           empty($raw_age) ||
           empty($raw_animalName) ||
           empty($raw_neuter) ||
           empty($raw_declaw) ||
           empty($raw_species) ||
           empty($raw_breed) ||
           empty($raw_branch))
           {
            echo "Please enter full information";
        }
        else
        {
            //query statement to insert a new animal
            $query = "INSERT INTO animal (id_number, species_id, age, name, neutered, declawed) VALUES ('NULL','$raw_speciesid','$raw_age','$raw_animalName','$raw_neuter','$raw_declaw')";

            //mysqli_query gets the query ready to gooooo
            $run_query = mysqli_query($connection, $query);

            //checks to see if the query worked
            if ($run_query){
                echo "<br>Record added.";
            } else {
                echo "<br>Record not added.";
            }

            //takes the last incremented id from animal for our other animal tables (dog, cat, other)
            $last_id = mysqli_insert_id($connection);

            //checks to see which species was entered
            if ($raw_species == "dog") {

                $query2 = "INSERT INTO dog (id_number, breed, branch_id) VALUES ('$last_id','$raw_breed','$raw_branch')";
                $run_query = mysqli_query($connection, $query2);

                if ($run_query){
                    echo "<br>Record added.";
                } else {
                     echo "<br>Record not added.";
                }

            } else if ($raw_species == "cat") {

                $query2 = "INSERT INTO cat (id_number, breed, branch_id) VALUES ('$last_id','$raw_breed','$raw_branch')";
                $run_query = mysqli_query($connection, $query2);

                if ($run_query){
                    echo "<br>Record added.";
                } else {
                     echo "<br>Record not added.";
                }

            } else if ($raw_species == "other") {
                $query2 = "INSERT INTO other (id_number, breed, branch_id) VALUES ('$last_id','$raw_breed','$raw_branch')";

                $run_query = mysqli_query($connection, $query2);
                if ($run_query){
                    echo "<br>Record added.";
                } else {
                     echo "<br>Record not added.";
                }
            } else {
                echo "no sir";
            }
        }
    }
    mysqli_close($connection);
