<?php
include '../Nav/nav_signout.php';
include 'adminsidebar.php';
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
<meta charset='utf-8'/>
<title>Carnegie</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src="../js/jscolor.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
<style>
 #sidetext { position: fixed;
  top:94px;
  overflow:auto;
    bottom: 0;
	margin-left:-14px;
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

<!--<base target="_blank">-->

</head>
<body>

<div class="main col-md-8 col-md-offset-2 col-xs-6 col-lg-6" >
<div class="container" id="sidetext">
<div class = "row">

<h3> Add Category Here </h3>
 
  <form action="adminaddcategorycheck.php" role="form" method="POST">
    <div class="form-group">
      <label for="addcategory">Add Category:</label>
      <input type="text" class="form-control"  id="addcategory" name="addcategory" placeholder="add category" required autofocus/>
    </div>

	<div  class="form-group">
	 <label for="color">Marker color:</label>
    <input type="text" class="jscolor" name="jscolor" value="ab2567">
  
</div>
<br>
<input name="submit" type="submit" value="Update" class="btn btn-primary center-block" /></p>

	</body>
	</html>
	
	
	