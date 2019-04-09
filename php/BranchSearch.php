<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('dbconnection.php');
        $searchValue = $_POST['searchingValue'];
        $query = "SELECT * FROM Branch WHERE ";
    }

    else {
        $query = "SELECT * FROM Branch";
        $SearchResult = searchTable($query);
    }

    function searchTable($query) {
        include('dbconnection.php');
        //mysqli_query makes a query against DB
        $results = mysqli_query($connection, $query);
        return $results;
    }
?>


<html lang = "en">
<head>
    <title> Branches </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Branch Table</h2>
  <!-- <a> makes a hyperlink -->
  <a href = "BranchTable.php"> Go to Branch List </a>
  
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
         <input type = "text" name = "searchingValue" placeholder="Search"> <br>
     <input type = "submit" name = "searchBtn" value = "Search"> <br>
 
  <table class="table table-bordered table table-hover">
      <!-- thead, tbody, tfoot used to group respective content in table -->
    <thead>
      <tr>
        <!-- makes header for table -->
        <th>Branch ID</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>City</th>
        <th>Province</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_array($searchResult)): ?>
        <!--  <tr> makes a row -->
      <tr>
        <!-- <td> makes regular table cells -->
        <td><?php echo $row['Branch ID']?></td>
        <td><?php echo $row['Phone Number']?></td>
        <td><?php echo $row['Address']?></td>
        <td><?php echo $row['City']?></td>
        <td><?php echo $row['Province']?></td>
        <td><?php echo $row['Country']?></td>

      </tr>
    <?php endwhile;?>
    </tbody>
  </table>
   </form>
</div>
    
</body>
</html>