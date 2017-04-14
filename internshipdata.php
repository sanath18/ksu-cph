<?php
include 'nav_signout.php';

include 'usersidebar.php';
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
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
	<style>
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
body { 
    padding-top: 65px; 
}
</style>
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<div class="container">
<div class = "row">
<div class = "col-md-8 col-md-offset-2">
<div class="record-container">
  <h1 class="from-title" align="center"> Internship data</h1><br><br>
<h4>Student Name: Test</h4>
<h4>Date:04/12/2017</h4>
<h4>Time:02:21</h4>
<h4>Answers for question 1</h4>
<h5> option1 <br> option3 <br> </h5>
<h4>Answers for question 2</h4>
<h5> option4 <br> option5 <br> </h5>
<h4>Description: this is a test description about the intern data </h4><br><br>
<h4>Student Name: Test2</h4>
<h4>Date:04/12/2017</h4>
<h4>Time:02:21</h4>
<h4>Answers for question 1</h4>
<h5> option2 <br> option4 <br> </h5>
<h4>Answers for question 2</h4>
<h5> option1 <br> option5 <br> </h5>
<h4>Description: this is a test description about the intern data </h4>
  </div>
  </div>
  </div>
</div>
</body>
</html>