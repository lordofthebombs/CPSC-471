<?php

    //include'addBranch.php';
    global $branchID;
    global $phoneNum;
    global $address;
    global $city;
    global $province;
    global $country;

    if(isset($_POST['addBranch'])){
        
        $addBranch = "INSERT INTO BranchTable (branchID, phoneNum, address, city, province, country) VALUES ($branchID, $phoneNum, $address, $city, $province, $country)";
    
        $runaddBranch = mysqli_query($connection, $query);
    
        if($runaddBranch){
            echo "<br>Branch added to records";
        }
        
        else {
        echo "<br> ERROR: Branch not added";
    }
}

    else{
        $deleteBranch = "DELETE FROM BranchTable WHERE (branchID = $branchID AND phoneNum = $phoneNum AND address = $address AND city = $city AND province = $province AND country = $country)";
        
        $rundeleteBranch = mysqli_query($connection);
        if($rundeleteBranch){
            echo "Deleted branch";
        }
        else{
            echo "Branch not deleted";
        }
    }
?>