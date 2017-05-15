<?php
include '../Classes/conn.php';
if(!isset($_SESSION)){
    session_start();
}
$LocationId=$_SESSION['LocationId'];
$Tilte = $_POST['Title'];
$Latitude = $_POST['Latitude'];
$Longitude = $_POST['Longitude'];
//$LocationType = $_POST['LocationType'];
$url = $_POST['url'];
$Description = $_POST['Description'];
$sql = "update health_location set Title='$Tilte',Latitude='$Latitude',Longitude='$Longitude',url='$url',Description='$Description' where LocationId=$LocationId";
if($conn->query($sql)){
echo "<script>alert('update success');window.location='admin.php'</script>";
}
unset($_SESSION['LocationId']);
$conn->close();
?>