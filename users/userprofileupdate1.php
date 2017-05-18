<?php
include '../Nav/nav_signout.php';
include 'usersidebar.php';
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
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
<title>health</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


 
    <link rel="css/stylesheet" href="../css/style.css">
    <link href="../css/style3.css" rel="stylesheet" type="text/css">
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
      <style>
    
  .main { position: fixed;
  top:92px;
    bottom: 0;
   width:100%
    height: 100%;
	
    }
	.sidebar {
position:fixed;
  display: block;
  top: 82px;
 
  bottom:0;
  z-index: 1000;
  min-height: 100%;
  max-height: none;
  overflow: auto;
}
   #map { position: fixed;
  top:83px;
    bottom: 0;
    width: 100%;
    height: 88%;
	margin-left:-16px;
    }



</style>
</head>
<body>

<?php

include("../Classes/conn.php");

$query = "SELECT * from health_user where UserId='".$_SESSION['id']."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>


<?php
$status = "";
if(isset($_POST['submit']))
{

$Password=$_POST[('Password')];
$Username=$_POST['Username'];
$Fullname=$_POST['Fullname'];



$update="UPDATE health_user set PassWord='$Password',UserName='$Username',FullName='$Fullname' where UserId='$user_id'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "<script type='text/javascript'> window.location.replace('userprofile.php');</script>";
echo ".$status.";
}else {
?>
<div class="main col-md-9 col-md-offset-2 col-xs-6 col-lg-8">
             
<div class="container">
<div class = "row">
<h3> Edit Profile </h3>
<form name="form" method="post" action="userprofileupdate1.php"> 
  <div class="form-group">
<input type="hidden" name="new" value="1" />
<label for="Email">Email:</label>
<input type="text" name="Email" class="form-control" type="hidden" readonly="readonly" value="<?php echo $row['Email'];?>" /><br>
<label for="Password">Password:</label>
<p><input type="password" name="Password" class="form-control" readonly="readonly" value="<?php echo $row['PassWord'];?>" /></p><br>
<label for="Username">Username:</label>
<input type="text" name="Username" class="form-control" type="hidden" value="<?php echo $row['UserName'];?>" /><br>
<label for="Fullname">Fullname:</label>
<input type="text" name="Fullname" class="form-control" type="hidden" value="<?php echo $row['FullName'];?>" /><br>
<p><input name="submit" type="submit" value="Update" class="btn btn-primary center-block" onclick="return confirm('Are you sure you want to edit')" /></p>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
</body>
</html>