<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "adoptioncentre";
    
    //establish the connection to the DB
    $connection = mysqli_connect($server,$username,$password,$database);


try {
    $connection = mysqli_connect($server,$username,$password,$database);
     if($connection) {
        echo "Database connection established.";
    }
} catch (Exception $errormsg) {
    echo $errormsg->getMessage();
}
?>