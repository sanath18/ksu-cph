<?php
include 'nav_signout.php';
include 'studentsidebar.php';
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];

}else{
    header("location: index.php");
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


 
    <link rel="css/stylesheet" href="style.css">
    <link href="css/style3.css" rel="stylesheet" type="text/css">
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
 
</style>
</head>
<body>

<div id="main-menu-bg"></div>
<?php

include("conn.php");

$query = "SELECT * from health_user where UserId='".$_SESSION['id']."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<!--<link rel="stylesheet" href="../assets/stylesheets/bootstrap-3.3.2.min.css" type="text/css"/>-->

<div class="container">
  <div class="row">
    <div class="main col-md-8 col-md-offset-2 col-xs-6 col-lg-8">
                <div class="col-md-12 lead"><h2><center>User profile<center><h2></div>
			
		          <h2 class="only-bottom-margin"><center>User Name: <?php echo $row['UserName'];?></center></h2>
                  <h4><span class="text-muted"><center>Email:</span> <?php echo $row['Email']; ?></center></h4>
                  <h4><span class="text-muted"><center>Fullname:</span> <?php echo $row['FullName'];?></center></h4><br>
                 
                   
<script>
function go_update()
{
	window.location.href="studentprofileupdate.php";
}
</script>
          
              <hr><button class="btn btn-default pull-right" onclick="go_update()"><i class="glyphicon glyphicon-pencil"></i>Edit</button>
            </div>
          </div>
        </div>
      </div>