   
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('dbconnection.php');
        $searchValue = $_POST['searchingValue'];
        $query = "SELECT * FROM `client` WHERE CONCAT(`client_id`, `email`, `street`, `city`, `province`, `country`, `phone_number`, `first_name`, `last_name`) LIKE '%".$searchValue."%'";
        $searchResult = searchTable($query);

    } else {
        $query = "SELECT * FROM client";
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
    <title>View Clients </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Client Table</h2>
  <a href = "addClient.php"> Go to Add Clients </a>
  <br>
  <a href = "adoptionCentreLanding.php"> Go to Landing Page</a>
<form method = "post" action ="<?php echo $_SERVER['PHP_SELF'];?>">
     <input type = "text" name = "searchingValue" placeholder="Search"> <br>
     <input type = "submit" name = "searchBtn" value = "Search"> <br>
 
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Client ID</th>
        <th>Email</th>
        <th>Street</th>
        <th>City</th>
        <th>Province</th>
        <th>Country</th>
        <th> Phone Number</th>
        <th> First Name</th>
        <th> Last Name</th>
        <th> Age </th>


        <th> Edit </th>
        <th> Delete </th>
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_array($searchResult)): ?>
      <tr>
        <td><?php echo $row['client_id'] ?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['street']?></td>
        <td><?php echo $row['city']?></td>
        <td><?php echo $row['province']?></td>
        <td><?php echo $row['country']?></td>
        <td><?php echo $row['phone_number']?></td>
        <td><?php echo $row['first_name']?></td>
        <td><?php echo $row['last_name']?></td>
        <td><?php echo $row['age']?></td>
        <td><a class = "btn btn-primary" href="updateClient.php?client_id=<?php echo $row['client_id'] ?>"> Edit</a></td>
        <td><a class = "btn btn-danger" href="deleteClient.php?client_id=<?php echo $row['client_id'] ?>">Delete</a></td>

      </tr>
    <?php endwhile;?>
    </tbody>
  </table>
   </form>
</div>

</body>
</html>
