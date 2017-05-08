<?php
include 'conn.php';
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
	
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<!--<div class="main col-md-8 col-md-offset-2 col-xs-6 col-lg-6" >-->
<div class="container" id="sidetext">
<div class = "row">
<h3> Add options Question Here</h3>
<h4>please add each option with semi-colon(<b>;</b>)</h4>
  <form action="internsingleoptionsquestioncheck.php" role="form" method="POST">
    <div class="form-group">
      <label for="addquestion">Add Question:</label>
      <input type="text" class="form-control"  id="addquestion" name="addquestion" placeholder="Add question" required autofocus/>
      <label for="addoptions">Add options:</label>
      <input type="text" class="form-control"  id="addoptions" name="addoptions" placeholder="Add options"/>
    </div>
      <div>
</div>
<button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">Submit</button>  
</form>

  </div>
  </div>
<!--</div>-->
</body>
</html>
