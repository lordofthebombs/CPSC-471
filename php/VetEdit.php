<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
Name: <input type = "varchar" name = "clinicName" placeholder = "Clinic Name">
<br>
Phone Number: <input type = "number" name = "phoneNum" placeholder = "Enter phone number">
<br>
<!--div allows for the side by side entry boxes-->
<div class = "input-group"></div>
Location: <input type = "varchar" name = "street" placeholder = "Street"> <input type = "varchar" name = "city" placeholder = "City"><input type = "varchar" name = "province" placeholder="Province"><input type = "varchar" name = "country" placeholder="Country">
<br>
<!--Admin access?-->

</form>

<?php
//takes text from dbconnection.php and copies it into this file
include('dbconnection.php');

//checks to see if request was POST or GET
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clinicName = $_POST['clinicName'];
    $phoneNum = $_POST['phoneNum'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
}
if (empty($clinicName) || empty($phoneNum) || empty(street) || empty($city) || empty($province) || empty($country)){
    echo "Please fill out branch information";
}


include('dbconnection.php');
$connect = mysqli_connect($connect, $queue);
if(!$connect){
    die("Unable to connect: ");
}
$sql = "UPDATE vet_clinic SET (clinicName = $clinicName AND phoneNum = $phoneNum AND street = $street AND city = $city AND province = $province AND country = $country)";
?>