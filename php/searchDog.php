<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('dbconnection.php');
        $searchValue = $_POST['searchingValue'];
        $query = "SELECT * FROM `dog` WHERE CONCAT(`id_number`, `breed`, `branch_id`) LIKE '%".$searchValue."%'";
        $searchResult = searchTable($query);

    } else {
        $query = "SELECT * FROM dog";
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
    <title>View Dogs </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Dogs</h2>
  <a href = "animalForm.php"> Go to Add Animal </a>
  <br>
  <a href = "animalTableSearch.php"> Go to Animal Table </a>

<form method = "post" action ="<?php echo $_SERVER['PHP_SELF'];?>">
     <input type = "text" name = "searchingValue" placeholder="Search"> <br>
     <input type = "submit" name = "searchBtn" value = "Search"> <br>

  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Animal ID</th>
        <th>Breed</th>
        <th>Branch ID</th>
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_array($searchResult)): ?>
      <tr>
        <td><?php echo $row['id_number'] ?></td>
        <td><?php echo $row['breed']?></td>
        <td><?php echo $row['branch_id']?></td>
     

      </tr>
    <?php endwhile;?>
    </tbody>
  </table>
   </form>
</div>

</body>
</html>
