<html lang="en">
<table>
<tr>
    <th>Clinic Name</th>
    <th>Phone Number</th>
    <th>Street</th>
    <th>City</th>
    <th>Province</th>
    <th>Country</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "");
if ($conn-> connect_error){
    die("Connection failed:". $conn-> connect_error);
}

$sql = "SELECT clinicName, Phone Number, Street, City, Province, Country FROM vet_clinic";   
$result = $conn-> query($sql);
    
if ($result-> num_rows >0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["Branch ID"]."</td><td>". $row["Phone Number"]."</td><td>". $row["Street"]."</td><td>". $row["City"]."</td><td>". $row["Province"]."</td><td>". $row["Country"]."</td></tr>";
    }
    echo "</table>";
}
else {
    echo "No results";
}
    
?>
</table>
</html>
