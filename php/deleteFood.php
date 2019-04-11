<?php
include("dbconnection.php");
$brand = $_GET['brand'];
$query = "DELETE FROM food WHERE brand='$brand'";
$runQuery = mysqli_query($connection, $query);
header("Location: http://localhost/dashboard/cpsc-471/foodTable.php");
?>
