<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adoption Centre Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Adoption Centre Login</h2>
  <form method = "post" class="form-horizontal" role = "form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name = "submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>



<?php
    include('dbconnection.php');
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
        //raw data
        $raw_email = trim($_POST['email']);
        $raw_password = trim($_POST['pwd']);
        
        //clean and validate data
        $clean_email = filter_var($raw_email, FILTER_VALIDATE_EMAIL);
        $clean_password = filter_var($raw_password, FILTER_SANITIZE_STRING);
        
        if(isset($_POST["submit"])) {
            $query = "SELECT * FROM user WHERE email = '$clean_email' AND password = '$clean_password'";
            $run_query = mysqli_query($connection, $query);
            
            if($run_query) {
                    echo "Login Successful";
                header("Location:./adoptionCentreLanding.php");
            } else {
                echo "Could not login.";    
            }
        }
            
    } 
    
    
    
    
?>
</html>

