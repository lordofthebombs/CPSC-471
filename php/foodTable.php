<?php include("dbconnection.php"); ?>

<DOCTYPE !html>
<html lang="en">
<head>
    <title>Food Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2> Food </h2>
        <a href="adoptionCentreLanding.php"> Go to Landing Page</a>
        <form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
            <input type = "text" name = "brand" placeholder = "Brand name">
            <input type = "text" name = "animalType" placeholder = "Animal type">
            <input type = "number" name = "quantity" placeholder = "Quantity">
            <input type = "submit" name = "addBtn" value = "Add">
            <br>
        </form>

        <table class = "table table-bordered table table-hover">
            <thead>
                <tr>
                    <th> Brand name </th>
                    <th> Animal type </th>
                    <th> Quantity </th>
                    <th> Edit </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                <?php   $searchFood = "SELECT * FROM `food`";
                        $result = mysqli_query($connection, $searchFood);
                        while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['brand'];?></td>
                    <td><?php echo $row['species_type'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><a class = "btn btn-primary" href="updateFood.php?brand=<?php echo $row['brand']; ?>"> Edit</a></td>
                    <td><a class = "btn btn-danger" href="deleteFood.php?brand=<?php echo $row['brand']; ?>"> Delete</a></td>
                </tr>
                <?php   } //Endwhile ?>
            </tbody>
        </table>





<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $brand = $_POST["brand"];
        $animalType = $_POST["animalType"];
        $quantity = $_POST["quantity"];
    }
    if (empty($brand) || empty($animalType) || empty($quantity)) {
        echo "Please enter in all information";
    }
    else {
        $addFood = "INSERT INTO food (brand, species_type, quantity)
        VALUES ('$brand', '$animalType', $quantity)";
        $runQuery = mysqli_query($connection, $addFood);
        if($runQuery) {
            echo "<br>Food added to database";
            header("Refresh:1");
        }
        else {
            echo "<br>ERROR: Food not added to database";
            header("Refresh:1");
        }
    }
 ?>