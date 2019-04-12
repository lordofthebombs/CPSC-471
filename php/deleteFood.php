<?php
include("dbconnection.php");
$brand = $_GET['brand'];
$query = "DELETE FROM food WHERE brand='$brand'";
$runQuery = mysqli_query($connection, $query);
header("Location: http://localhost:9090/dashboard/working-files/foodTable.php");
?>