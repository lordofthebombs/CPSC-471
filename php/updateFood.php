<?php
include("dbconnection.php");
$brand = $_GET['brand'];
$query = "SELECT * FROM food WHERE brand='$brand'";
$updatedForm = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Food<Entry></Entry></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Edit <Staff></Staff> </h2>
        <form class="form-horizontal" method = "post" action="">
            <?php while($row = mysqli_fetch_array($updatedForm)): ?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Enter new quantity:</label>
                    <div class="col-sm-10">
                        <input type="number"  class="form-control" value=<?php echo $row['quantity']?> name="quantity">
                    </div>
                </div>
            <?php  endwhile;?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type = "submit" class = "btn" name = "submitBtn">
                    <a href="foodTable.php"> Go to back to Food Table </a>
                    <a href="adoptionCentreLanding.php"> Go to Landing Page </a>

                </div>
            </div>
        </form>
    </div>

</body>
</html>


<?php
//includes the connection opening
include('dbconnection.php');
if(isset($_POST['submitBtn']))
{
    $quantity= $_POST['quantity'];
    $query = "UPDATE food SET quantity = $quantity WHERE brand = '$brand'";
    $run_query = mysqli_query($connection, $query);
    if ($run_query) {
        echo "Food quantity updated.";
    } else {
        echo "Food quantity not be updated.";
    }
}
?>