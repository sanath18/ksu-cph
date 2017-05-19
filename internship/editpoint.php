<?php
include '../Classes/conn.php';
include '../Nav/nav_signout.php';
include 'usersidebar.php';
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
$LocationId = $_GET['loc_id'];
$sql = "SELECT * FROM intern_location where LocationId=$LocationId";
if($record_set=$conn->query($sql));{
$record=$record_set->fetch_assoc();
$Title = $record['Title'];
$Latitude = $record['Latitude'];
$Longitude = $record['Longitude'];
$url = $record['url'];
$path =$record['path'];
$Description = $record['Description'];
}
$_SESSION['LocationId'] = $LocationId;
$_SESSION['path']= $path;
if ($url==0){
$url=Null;
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="css/stylesheet" href="../css/style.css">
    <link href="../css/style3.css" rel="stylesheet" type="text/css">
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
 
</style>
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<div class="container">
<div class = "row">
<div class = "main col-md-6 col-md-offset-3">
<div class="record-container">
  <h1 class="from-title" align="center">Edit a point</h1>
<form action="editpointcheck.php" method="POST" enctype="multipart/form-data"><!--enctype is encoding type of choosen file-->
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control"  id="title" name="title" value="<?php echo $Title ?>" required autofocus/>
    </div>
    
    <div class="form-group">
      <label for="Latitude">Latitude:</label>
      <input type="text" class="form-control" id="latitude" name="latitude" readonly value="<?php echo $Latitude ?>">
    </div>
    <div class="form-group">
      <label for="longitude">Longitude:</label>
      <input type="text" class="form-control"  id="longitude" name="longitude" readonly value="<?php echo $Longitude ?>" >
    </div>
<br>
<div class="form-group">
      <label for="Url">Url:</label>
      <input type="text" class="form-control" id="url" name="url" value="<?php echo $url ?>">
</div>
<label for="Image">Image:</label>
      
<label class="btn btn-primary" for="my-file-selector">
    <input id="my-file-selector" name="image" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
    change Image
</label>

<span class='label label-info' id="upload-file-info"></span>
<br><div class="form-group">
      <label for="Description">Description:</label>
      <textarea class="form-control" rows="5" id="description" name="description" value="<?php echo $Description ?>"></textarea>
</div>

</div>
  <button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">update</button>

    </form>
  </div>
  </div>
  </div>
</div>
</body>
</html>
