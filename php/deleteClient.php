<?php
        
        
    include("dbconnection.php");
  
    $client_id = $_GET['client_id'];
    $query = "DELETE from client WHERE client_id='$client_id'";
    $runquery = mysqli_query($connection, $query);

    if ($runquery) {
        echo "Successfully deleted client.";
    } else {
        echo "Could not delete client.";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
</head>
<body>
       <br>
        <a href="searchClient.php"> Go to Branch Table </a>
 
</body>
</html>