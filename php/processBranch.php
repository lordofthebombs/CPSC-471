<?php

    //include'addBranch.php';
    global $branchID;
    global $phoneNum;
    global $street;
    global $city;
    global $province;
    global $country;

    if(isset($_POST['addBranch'])){
        
        $addBranch = "INSERT INTO BranchTable (branchID, phoneNum, street, city, province, country) VALUES ($branchID, $phoneNum, $street, $city, $province, $country)";
    
        $runaddBranch = mysqli_query($connection, $query);
    
        if($runaddBranch){
            echo "<br>Branch added to records";
        }
        
        else {
        echo "<br> ERROR: Branch not added";
    }
}

    else{
        $deleteBranch = "DELETE FROM BranchTable WHERE (branchID = $branchID AND phoneNum = $phoneNum AND street = $street AND city = $city AND province = $province AND country = $country)";
        
        $rundeleteBranch = mysqli_query($connection, query);
        if($rundeleteBranch){
            echo "Deleted branch";
        }
        else{
            echo "Branch not deleted";
        }
    }
?>