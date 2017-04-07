<?php
include 'nav_signin.php';
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
<p class="error-message">                                        
	<?php
    if(isset($_GET['RES']))
    {
        if($_GET['RES']=='userexist'){echo "User alredy exist";}
      }
      ?>
      </p>
  <h1 class="from-title" align="center">Sign up here...</h1>
<form action="registrationcheck.php" role="form" method="POST">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control"  id="username" name="username" placeholder="Enter Username" required autofocus/>
    </div>
    <div class="form-group">
      <label for="fullname">Fullname:</label>
      <input type="text" class="form-control"  id="fullname" name="fullname" placeholder="Enter Fullname" required autofocus/>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control"  id="email" name="email" placeholder="Enter Email" required autofocus/>
    </div>
     <button for="register_btn" type="submit" id="register_btn" name="register_btn" class="btn btn-primary center-block">Register</button>
    </form>
  </div>
  </div>
  </div>
</div>
</body>
</html>