<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('dbconnection.php');
        $searchValue = $_POST['searchingValue'];
       $query = "SELECT * FROM `adoption` WHERE CONCAT(`adoption_id`, `adoptee`, `adopter`) LIKE '%".$searchValue."%'";
        $searchResult = searchTable($query);

    } else {
        $query = "SELECT * FROM adoption";
        $searchResult = searchTable($query);
    }

    function searchTable($query) {
        include('dbconnection.php');
        $searchedResult = mysqli_query($connection,$query);
        return $searchedResult;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Adoptions </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Adoption Table</h2>
  <a href = "adoptionCentreLanding.php"> Go to Landing Page</a> <b></b>
  <a href = "setAdoption.php"> Set Another Adoption</a>

  
<form method = "post" action ="<?php echo $_SERVER['PHP_SELF'];?>">
     <input type = "text" name = "searchingValue" placeholder="Search"> <br>
     <input type = "submit" name = "searchBtn" value = "Search"> <br>
 
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Adoption ID</th>
        <th>Adopter ID</th>
        <th> Adopter Name</th>
        <th>Adoptee ID</th>
        <th> Animal Name</th>
     
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_array($searchResult)): ?>
      <tr>
         <?php 
            include('dbconnection.php');

            $query = "SELECT first_name FROM client where " . $row['adopter'] . "=client_id";
            $run_query = mysqli_query($connection, $query);
            $result = mysqli_fetch_array($run_query);
         ?>   
        <?php 
            $query2 = "SELECT name FROM animal where " . $row['adoptee'] . "=id_number";
            $run_query2 = mysqli_query($connection, $query2);
            $result2 = mysqli_fetch_array($run_query2);
         ?>       
        <td><?php echo $row['adoption_id']?></td>
        <td><?php echo $row['adopter']?></td>
        <td><?php echo $result['first_name']?></td>
        <td><?php echo $row['adoptee']?></td>
        <td><?php echo $result2['name']?></td>

      </tr>
    <?php endwhile;?>
    </tbody>
  </table>
   </form>
</div>

</body>
</html>