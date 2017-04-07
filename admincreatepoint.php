<?php
include 'nav_signout.php';
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];	
}else{
    header("location: index.php");
    die();
}
$lng = $_GET['lng'];
$lat = $_GET['lat']
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
</head>
<body>
<div class="container">
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
<div class="record-container">
  <h1 class="from-title" align="center">Create a point</h1>
<form action="admincreatepointcheck.php" role="form" method="POST">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control"  id="title" name="title" placeholder="Enter Title" required autofocus/>
    </div>
    
    <div class="form-group">
      <label for="Latitude">Latitude:</label>
      <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $lat ?>">
    </div>
    <div class="form-group">
      <label for="longitude">Longitude:</label>
      <input type="text" class="form-control"  id="longitude" name="longitude" value="<?php echo $lng ?>">
    </div>
</div>
<br>
  <button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">Submit</button>

    </form>
  </div>
  </div>
  </div>
</div>

</body>
</html>