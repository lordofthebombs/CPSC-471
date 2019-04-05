<!-- These will be the inputs that the user will enter and search for an staff member
by terms that they entered in -->
<form method = "post" action = "<?php echo $_SERVER["PHP_SELF"];?>">
    First name: <input type = "text" name = "fName">
    Last name: <input type = "text" name = "lName">
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
    // Checks to see if all fields are empty and if so return all employees
    if (empty($fName) && empty($lName) && empty($branchID)) {
        $query = "SELECT first_name, last_name, s.staff_id, branch_id FROM staff AS s, works_at AS w
        WHERE s.staff_id = w.staff_id";
    }
    // If a branch number is specified, show relevant staff
    elseif (!empty($branchID)) {
        $query = "SELECT first_name, last_name, s.staff_id,branch_id FROM staff AS s, works_at AS w
        WHERE s.first_name LIKE '$fName%' AND s.last_name LIKE '$lName%' AND w.branch_id = $branchID AND s.staff_id = w.staff_id ";
    }

    else {
        $query = "SELECT first_name, last_name, s.staff_id, branch_id FROM staff AS s, works_at AS w
        WHERE s.first_name LIKE '$fName%' AND s.last_name LIKE '$lName%' AND s.staff_id = w.staff_id";
    }

    echo "<br>".$query."<br>";

    $queryResult = mysqli_query($connection, $query);
?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<table style = "width: 20%">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Staff ID</th>
        <th>Branch ID</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($queryResult)) { ?>
    <tr>
        <td><?php echo $row['first_name'];?></td>
        <td><?php echo $row['last_name'];?></td>
        <td><?php echo $row['staff_id'];?></td>
        <td><?php echo $row['branch_id'];?></td>
    </tr>
    <?php } ?>  <!-- End of php while loop -->
</table>
