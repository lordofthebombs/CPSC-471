<?php
        
        
    include("dbconnection.php");
  
    $branch_id = $_GET['branch_id'];
    $query = "DELETE from adoption_branch WHERE branch_id='$branch_id'";
    $runquery = mysqli_query($connection, $query);

    if ($runquery) {
        echo "Successfully deleted branch.";
    } else {
        echo "Could not delete branch.";
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
        <a href="searchBranch.php"> Go to Branch Table </a>
 
</body>
</html>