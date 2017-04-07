<?php
//header("Content-Type: multipart/form-data");
header('Content-Type: application/json');
include 'conn.php';
define(‘ROOT’, dirname(__FILE__).DIRECTORY_SEPARATOR.”upload”);
	$filetype = $_FILES["file"]["type"];
	if($filetype == 'image/jpeg'){ 
		$type = '.jpg'; 
	} 
	if ($filetype == 'image/jpg') { 
		$type = '.jpg'; 
	} 
	if ($filetype == 'image/pjpeg') { 
		$type = '.jpg'; 
	} 
	if($filetype == 'image/gif'){ 
		$type = '.gif'; 
	} 
	if($filetype == 'image/png'){ 
		$type = '.png'; 
	} 
$uploaddir = '/var/www/html/ksu-cco/';
$UserId = $_POST['userid'];
$title = $_POST['title'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$locationtype = $_POST['locationtype'];
$file = $_POST['file'];
$upload = 'images/images/'.$title.$type;
if (move_uploaded_file($_FILES['file']['tmp_name'],$uploaddir.$upload)) {
 	$insert_query = "INSERT into `health_location` (Title,Latitude,Longitude,LocationType,UserId,Approval,color,size,icon) VALUES ('$title', '$latitude', '$longitude','$locationtype',$UserId,3,'#0000ff','medium','u')";
  if(mysqli_query($conn,$insert_query)){
    $loc_id = mysqli_insert_id($conn);
	$insert_picture= "INSERT INTO `health_picture` (LocationId) VALUES ($loc_id')";
    $insert_picture= "INSERT INTO `health_picture` (Path,LocationId) VALUES ('$upload','$loc_id')";
    mysqli_query($conn,$insert_picture);
}
	echo json_encode(array('result'=>'true'));
}else{
	echo json_encode(array('tpname'=>$file));
 	//echo json_encode(array('result'=>'false'));
	  }
$conn->close();
?>
