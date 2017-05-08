<?php
include 'nav_create.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- <link rel="icon" href="favicon.ico">-->
	<!--<base target="_blank">-->
<title>Carnegie</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


 
    <link rel="css/stylesheet" href="style.css">
    <link href="css/style3.css" rel="stylesheet" type="text/css">
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<div class="container">
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
<div class="login-container">
  <h1 class="from-title" align="center">Student Login</h1>
  <p class="error-message">                                        
	<?php
        if(isset($_GET['RES']))
            {
                if($_GET['RES']=='PasSNomTch'){echo "Invalid Email or Password.";}
                else if($_GET['RES']=='usernotexits'){echo "User does not exist";}
                else if($_GET['RES']=='success'){echo "Registration Success. Please log in";}
            }
             ?>   
  <form action="studentlogincheck.php" role="form" method="POST">
    <div class="form-group login">
      <label for="email">Email:</label>
      <input type="text" class="form-control"  id="email" name="email" placeholder="Enter email" required autofocus/>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required autofocus/>
    </div> 
   <!-- <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>-->
    <button for="login_btn" type="submit" id="login_btn" name="login_btn" class="btn btn-primary center-block">Submit</button>
  <a href="userregistration.php" class="text-center new-account">Create an account </a></br>
  <a href="changepass.php" class="text-center new-account">Forgot password </a>
  </form>
  </div>
  </div>
  </div>
</div>

</body>
</html>