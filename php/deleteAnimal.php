<?php
        
        
    include("dbconnection.php");
  
    $id_number = $_GET['id_number'];
    $query = "DELETE from animal WHERE id_number='$id_number'";
    
    $runquery = mysqli_query($connection, $query);
    if ($runquery) {
        echo "Successfully deleted record";
    } else {
        echo "Could not delete animal";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        <a href="animalTableSearch.php"> Go to Animal Table </a>
 
</body>
</html>