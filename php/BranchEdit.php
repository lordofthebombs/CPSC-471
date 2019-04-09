<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
Branch ID: <input type = "number" name = "branchID" placeholder = "Enter branch ID">
<br>
Phone Number: <input type = "number" name = "phoneNum" placeholder = "Enter phone number">
<br>
<!--div allows for the side by side entry boxes-->
<div class = "input-group"></div>
Location: <input type = "varchar" name = "address" placeholder = "Address"> <input type = "varchar" name = "city" placeholder = "City"><input type = "varchar" name = "province" placeholder="Province"><input type = "varchar" name = "country" placeholder="Country">
<br>
<!--Admin access?-->

</form>

<?php
//takes text from dbconnection.php and copies it into this file
include('dbconnection.php');

//checks to see if request was POST or GET
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $branchID = $_POST['branchID'];
    $phoneNum = $_POST['phoneNum'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
}
if (empty($branchID) || empty($phoneNum) || empty($address) || empty($city) || empty($province) || empty($country)){
    echo "Please fill out branch information";
}


include('dbconnection.php');
$connect = mysqli_connect($connection, $queue);
if(!$connect){
    die("Unable to connect: ");
}
$sql = "UPDATE BranchTable SET (branchID = $branchID AND phoneNum = $phoneNum AND address = $address AND city = $city AND province = $province AND country = $country)";
?>