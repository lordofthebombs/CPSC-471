<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
Phone Number: <input type = "number" name = "phoneNum" placeholder = "Enter phone number">
<br>
<!--div allows for the side by side entry boxes-->
<div class = "input-group"></div>
Location: <input type = "text" name = "street" placeholder = "Street">
<input type = "text" name = "city" placeholder = "City">
<input type = "text" name = "province" placeholder="Province">
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
}
if (empty($phoneNum) || empty($address) || empty($city) || empty($province)){
    echo "Please fill out branch information";
}

else {
    $addBranch = "INSERT INTO adoption_branch (branch_id, phone_number, province, city, street)
    VALUES (NULL, $phoneNum, $province, $city, $street)";

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
