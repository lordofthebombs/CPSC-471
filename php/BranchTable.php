<!HTML>

<html lang="en">
    
<head>
  <title>View Branches</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <h2>Branch Table</h2>
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Branch ID</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>City</th>
        <th>Province</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
     <?php
        include('dbconnection.php');
        $query = "SELECT * FROM Branch";
        $runquery = mysqli_query($connection, $query);
    
        while($result = mysqli_fetch_assoc($runquery))
        {
        ?>
         
      <tr>
        <td><?php echo $result['Branch ID']?></td>
        <td><?php echo $result['Phone Number']?></td>
        <td><?php echo $result['Address']?></td>
        <td><?php echo $result['City']?></td>
        <td><?php echo $result['Province']?></td>
        <td><?php echo $result['Country']?></td>


      </tr>
    <?php } ?>
    <a href="BranchEdit.php"> Edit branch info </a>
    </tbody>
  </table>
</div>
        
</body>    
    
</html>