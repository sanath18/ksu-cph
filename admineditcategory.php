<?php
include 'nav_signout.php';
include 'adminsidebar.php';
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

   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<div class="main col-md-4 col-md-offset-2 col-xs-6 col-lg-6" >
<div class="row" id="sidetext">

<h3> Edit or Delete Existing Category </h3>
<br>  
<?php
$sql = "SELECT LocationTypeId, LocationTypeName, LocationTypeColor FROM health_locationtype";
$result = mysqli_query($conn, $sql);
echo "<center><table border='2' cellpadding='10' ></center>";

echo "<tr> <th>CategoryId</th> <th><center>Category Name</center></th> <th><center>Marker Colour</center></th> <th>Edit or Delete</th> </tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "<tr><td>". $row["QuestionId"]. "</td> ";
		//echo "<td>". $row["Question"]. "</td> " ;
		//echo"<td>". $row["Type"]. "</td>";
		//echo "<td><a href='admineditquestion1.php?id=".$row['QuestionId']."'>Edit</a></td> &nbsp";
//echo "<td><a href='delete.php?id=".$row['QuestionId']."'>delete</a></td></tr>";
	echo "<tr>";
            echo "<td>".$row['LocationTypeId']."</td>";
            echo "<td>".$row['LocationTypeName']."</td>";
            echo "<td>".$row['LocationTypeColor']."</td>";
            echo "<td><a href=\"admineditcategorycheck.php?LocationTypeId=$row[LocationTypeId]\">Edit</a> | <a href=\"admindeletecategory.php?LocationTypeId=$row[LocationTypeId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	echo"</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
  </div>
  </div>
</div>
</div>
</div>
</body>
</html>