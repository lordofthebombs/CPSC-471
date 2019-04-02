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
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>id_number</th>
        <th>species_id</th>
        <th>age</th>
        <th>name</th>
        <th>neutered</th>
        <th>declawed</th>
      </tr>
    </thead>
    <tbody>
     <?php
        include('dbconnection.php');
        $query = "SELECT * FROM animal";
        $runquery = mysqli_query($connection, $query);
    
        while($result = mysqli_fetch_assoc($runquery))
        {
        ?>
         
    
      <tr>
        <td><?php echo $result['id_number']?></td>
        <td><?php echo $result['species_id']?></td>
        <td><?php echo $result['age']?></td>
        <td><?php echo $result['name']?></td>
        <td><?php echo $result['neutered']?></td>
        <td><?php echo $result['declawed']?></td>

      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
