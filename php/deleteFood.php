<?php
include("dbconnection.php");
$brand = $_GET['brand'];
$query = "DELETE FROM food WHERE brand='$brand'";
$runQuery = mysqli_query($connection, $query);
<<<<<<< HEAD
header("Location: http://localhost:9090/dashboard/working-files/foodTable.php");
?>
=======
header("Location: http://localhost/dashboard/cpsc-471/foodTable.php");
?>
>>>>>>> master
