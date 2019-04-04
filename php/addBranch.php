<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
Branch ID: <input type = "number" name = "branchID" placeholder = "Enter branch ID">
<br>
Phone Number: <input type = "number" name = "phoneNum" placeholder = "Enter phone number">
<br>
<!--div allows for the side by side entry boxes-->
<div class = "input-group"></div>
Location: <input type = "varchar" name = "address" placeholder = "Address"> <input type = "varchar" name = "city" placeholder = "City"><input type = "varchar" name = "arovince" placeholder="Province"><input type = "varchar" name = "aountry" placeholder="Country">
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

else {
    $addBranch = "INSERT INTO branch (branchID, phoneNum, address, city, province, country) VALUES ($branchID, $phoneNum, $address, $city, $province, $country)";
    
    $runaddBranch = mysqli_query($connection, $query);
    
    if($runaddBranch){
        echo "<br>Branch added to records";
    }
    else {
        echo "<br> ERROR: Branch not added";
    }
}

mysqli_close($connection);

?>