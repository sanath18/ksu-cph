<?php
include '../Nav/nav_create.php';
include '../Classes/conn.php';
$token = $_GET['t'];
$sql = "SELECT * FROM health_user WHERE token='".$token."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html >
  <head>

    <meta charset="UTF-8">
    <title>ksu-cco|Login</title>
     
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/style.css">
    <link href="style3.css" rel="stylesheet" type="text/css">
        
    </head>
<body>

	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
           
                     <div class="login-container">
                        
                            <h2 align ="center" style="color:black">Create new password</h2><br>
                            <p class="error-message">                                        
								<?php
                                    if(isset($_GET['RES']))
                                    {
                                        if($_GET['RES']=='PasNoEq'){echo "Two passwords are not same, please check them again.";}
                                        else if($_GET['RES']=='UrINacTIVe'){echo "This account is inactive. Contact healthksu@gmail.com.";}
                                        if($_GET['RES']=='NOuseRiDfOUnd'){echo "Email Address is not found. Make sure you're using the Email Address for your ksuhealth Account.";}
                                    }
                                ?>                                       
                             </p>
                                            
                           <form class="login" action="reseting_pwd.php?t=<?php echo $token; ?>" role="form" method="post">
                             <label for="login_password"style ="display:NONE">New Password</label><input type="password"class="form-control" id="new_password" name="new_password" placeholder="New Password" required/><br>
                             <label for="login_password"style ="display:NONE">Re-enter Password</label><input type="password" class="form-control"id="re_enter_password" name="re_enter_password" placeholder=" Re-enter Password" required/><br>
				<!--<input type="hidden" name="t" value="<?php echo $token; ?>">-->
                             <label for="login_submit"style ="display:NONE">Submit</label><input type="submit" id="submit" name="submit" value="Reset Password" class="btn btn-primary center-block" style="background-color:#337ab7;border-color:#289f75" />
                                                        


                            
                            </form></label>
                            
               		 </div><!-- end login-container -->
			
     			 </div><!-- /.col -->
    		</div><!-- /.row -->
		</div><!-- /.container -->

<?php 
if(isset($_POST['submit'])){
$token = $_GET['t'];
$new_pwd = $_POST['new_password'];
$re_pwd = $_POST['re_enter_password'];
if($new_pwd != $re_pwd){
	header("location: reseting_pwd.php?RES=PasNoEq&t=$token");
}else{
	$sql_update = "UPDATE health_user SET PassWord='".md5("$new_pwd")."' WHERE token='".$token."' AND UserName='".$row['UserName']."'";
	//var_dump($sql_update); //exit;
	$result_update = $conn->query($sql_update);
	if($result_update){
		echo "<script>alert(\"reset successfully\");window.location.href=\"login.php\"</script>";
	}
}
}
?>