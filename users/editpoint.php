<?php
include '../Classes/conn.php';
include '../Nav/nav_signout.php';
if(!isset($_SESSION)){
    session_start();
}
$LocationId = $_GET['loc_id'];
$_SESSION['LocationId'] = $LocationId;
$sql = "SELECT * FROM health_location left JOIN health_picture ON health_location.LocationId=health_picture.LocationId where health_location.LocationId=$LocationId";
if($record_set=$conn->query($sql));{
$record=$record_set->fetch_assoc();
$Title = $record['Title'];
$Latitude = $record['Latitude'];
$Longitude = $record['Longitude'];
$LocationType = $record['LocationType'];
$url = $record['url'];
$Description = $record['Description'];
}
$conn->close();
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
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<div class = "col-md-4 col-md-offset-4">
<div class="record-container">
  <h1 class="from-title" align="center">Edit a point</h1>
<form action="editpointcheck.php" role="form" method="POST">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control"  id="Title" name="Title" value="<?php echo $Title ?>" required autofocus/>
    </div>
    
    <div class="form-group">
      <label for="Latitude">Latitude:</label>
      <input type="text" class="form-control" id="Latitude" name="Latitude" value="<?php echo $Latitude ?>">
    </div>
    <div class="form-group">
      <label for="longitude">Longitude:</label>
      <input type="text" class="form-control"  id="Longitude" name="Longitude" value="<?php echo $Longitude ?>" required autofocus/>
    </div>
    <br>
    <!--<div class="container">
  <label for="Locationtype">Locationtype:</label>
  <div>
    <label class="radio-inline">
      <input type="radio" name="LocationType">Outreach
    </label>
    <label class="radio-inline">
      <input type="radio" name="LocationType">Patnership
    </label>
     </div>
</div><br>-->
<div class="form-group">
      <label for="Url">Url:</label>
      <input type="text" class="form-control" id="url" name="url" value="<?php echo $url ?>">
    </div>
  <div class="form-group">
      <label for="Description">Description:</label>
      <textarea class="form-control" rows="5" id="Description" name="Description" value="<?php echo $Description ?>"></textarea>
    </div>
</div>
<br>
  <button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">update</button>
  </form>
  </div>
</body>
</html>