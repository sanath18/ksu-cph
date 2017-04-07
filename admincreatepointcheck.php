<?php
include 'conn.php';
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];	
}else{
    header("location: index.php");
    die();
}
if(isset($_POST['submit_btn']))
{
$title = $_POST['title'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];					
$query = "INSERT into `health_location` (Title,Latitude,Longitude,Approval,color,size,icon) VALUES ('$title', '$latitude', '$longitude',1,'#00ffbf','medium','o')";
if(mysqli_query($conn,$query))
{
$loc_id = mysqli_insert_id($conn);
$sql = "INSERT INTO `health_picture` (LocationId) VALUES ('$loc_id')";
mysqli_query($conn,$sql);
header("location: admin.php");			
}					
}
$conn->close();
?>
