
   
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('dbconnection.php');
        $searchValue = $_POST['searchingValue'];
        $query = "SELECT * FROM `animal` WHERE CONCAT(`id_number`, `species_id`, `age`, `name`, `neutered`, `declawed`) LIKE '%".$searchValue."%'";
        $searchResult = searchTable($query);

    } else {
        $query = "SELECT * FROM animal";
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
  <title>View Animals</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Animal Table</h2>
  <a href ="adoptionCentreLanding.php"> Go to Landing Page</a>
  <br>
  <a href = "animalForm.php"> Go back to Animal Entry </a>
  <br>
  <a href = "searchDog.php"> View all Dogs </a>
  <br>
  <a href = "searchCat.php"> View all Cats </a>
  <br>
  <a href = "searchOther.php"> View Other Animals </a>


<form method = "post" action =   "<?php echo $_SERVER['PHP_SELF'];?>">
     <input type = "text" name = "searchingValue" placeholder="Search"> <br>
     <input type = "submit" name = "searchBtn" value = "Search"> <br>
 
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>id_number</th>
        <th>species_id</th>
        <th>age</th>
        <th>name</th>
        <th>neutered</th>
        <th>declawed</th>
        <th> Edit </th>
        <th> Delete </th>
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_array($searchResult)): ?>
      <tr>
        <td><?php echo $row['id_number'] ?></td>
        <td><?php echo $row['species_id']?></td>
        <td><?php echo $row['age']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['neutered']?></td>
        <td><?php echo $row['declawed']?></td>
        <td><a class = "btn btn-primary" href="updateAnimal.php?id_number=<?php echo $row['id_number'] ?>"> Edit</a></td>
        <td><a class = "btn btn-danger" href="deleteAnimal.php?id_number=<?php echo $row['id_number'] ?>">Delete</a></td>
      </tr>
    <?php endwhile;?>
    </tbody>
  </table>
   </form>
</div>

</body>
</html>
