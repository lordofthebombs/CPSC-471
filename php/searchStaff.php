<!-- These will be the inputs that the user will enter and search for an staff member
by terms that they entered in -->
<form method = "post" action = "<?php echo $_SERVER["PHP_SELF"]?>">
    First name: <input type = "text" name = "fName">
    Last name: <input type = "text" name = "lname">
    Branch ID: <input type = "number" name = "branchID">
    <input type = "submit">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $branchID = $_POST["branchID"];
    }

    include('dbconnection.php');
    // Checks to see if all fields are empty
    if (empty($fName) && empty($lName) && empty($branchID)) {
        $allQuery = "SELECT * FROM staff, "
    }
    elseif (!empty($branchID)) {
        $query = "SELECT `first_name`, `last_name`, `branch_id` FROM `staff`, `works_at`
        WHERE `first_name` LIKE \'$fName%\' AND `last_name` LIKE \'$lName%\' AND `branch_id` = $branchID";
    }
    else {
        $query = "SELECT `first_name`, `last_name`, `branch_id` FROM `staff`, `works_at`
        WHERE `first_name` LIKE \'$fName%\' AND `last_name` LIKE \'$lName%\';
    }

    $queryResult = mysqli_query($connection, $query);


?>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Branch ID</th>
    </tr>
</table>
