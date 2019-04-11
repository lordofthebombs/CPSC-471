<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
Phone Number: <input type = "number" name = "phoneNum" placeholder = "Enter phone number">
<br>
<!--div allows for the side by side entry boxes-->
<div class = "input-group"></div>
Location: <input type = "text" name = "street" placeholder = "Street">
<input type = "text" name = "city" placeholder = "City">
<input type = "text" name = "province" placeholder="Province">
<input type = "text" name = "country" placeholder="Country">
<input type = "submit" class = "btn">
<br>
<!--Admin access?-->
</form>


<?php
//takes text from dbconnection.php and copies it into this file
include('dbconnection.php');

//checks to see if request was POST or GET
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phoneNum = $_POST['phoneNum'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
}
if (empty($phoneNum) || empty($street) || empty($city) || empty($province) || empty($country)){
    echo "Please fill out all branch information";
}

else {
    $addBranch = "INSERT INTO adoption_branch (branch_id, phone_number, country, province, city, street, admin_id)
    VALUES (NULL, $phoneNum, '$country', '$province', '$city', '$street', NULL)";

    $runaddBranch = mysqli_query($connection, $addBranch);

    if($runaddBranch){
        echo "<br>Branch added to records";
    }
    else {
        echo "<br> ERROR: Branch not added";
    }
}

mysqli_close($connection);

?>
