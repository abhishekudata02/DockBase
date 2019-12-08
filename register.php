<?php
// Include config file
// Include config file
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'arcanine');
define('DB_PASSWORD', 'arcanine');
define('DB_NAME', 'simplelogin');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
{
    echo "SQl connection Successful!!";
}
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    }/* else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //store result 
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }*/
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        


		$fusername = $fpassword = '';

		$fusername = $_POST['username'];
		$fpwd = $_POST['password'];
		$fpassword = MD5($fpwd);

		$sql = "INSERT INTO user (username,password,other) VALUES ('$fusername','$fpwd','$fpwd')";
		echo $sql;
		$result = mysqli_query($conn, $sql);	
		if($result)
		{	
			//echo "Successful Login Query :".$sql;
			header("Location: index.php");
		}
		else
		{
			echo "Error :".$sql;
		}
       
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
            <div class="col-sm-10" style="width: 600px; margin-left: 250px; margin-top: 50px; ">
                <div class="jumbotron">
                    <div class="form-group" style="margin-top:-50px; ">
                        
                        <h3 style="margin-left:150px; ">
                            DockBase Signup
                        </h3>
                        <p>Please fill following form to create an account.</p>
                    </div>
                    <hr>

                  
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            
                            <!-------USERNAME------->

                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"> <label>Username</label></span>
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                </span>
                                
                                
                            </div>


                            <span class="help-block"><?php echo $username_err; ?></span>


                            <!--------------PASSWORD------------->

                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"><label>Password</label></span>
                                </span>
                                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                

                                
                                    
                            </div>
                            <span class="help-block"><?php echo $password_err; ?></span>

                            
                            <!------------Confirm Password---------------------->

                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"><label>Confirm Password</label></span>
                                </span>
                                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                            </div>
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            
                            <!--<div class="form-group">
                                <input type="submit" value ="LOGIN" class="btn btn-primary" style="width:430px"> 
                            </div>-->
                            <div class="form-group">
                                <button class="btn btn-primary" style="width:430px"> Submit </button>
                            </div>
                            <div class="form-group">
                                <label>
                                        Already have an account? <a href="index.php">Login Here</a>
                                </label>

                            </div>
                            


                        </form>
            </div>

    </div>
  </div>
  
     
</body>
</html>
