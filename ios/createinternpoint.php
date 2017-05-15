<?php
//header("Content-Type: multipart/form-data");
header('Content-Type: application/json');
include 'conn.php';
//define(‘ROOT’, dirname(__FILE__).DIRECTORY_SEPARATOR.”upload”);
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
$uploaddir = '/var/www/html/ksu-cph/';
$UserId = $_POST['userid'];
$title = $_POST['title'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
//$locationtype = $_POST['locationtype'];
$time = time();
$file = $_POST['file'];
$upload = 'images/images/'.$title.$type;
if (move_uploaded_file($_FILES['file']['tmp_name'],$uploaddir.$upload)) {
 	$insert_query = "INSERT into `intern_location` (Title,Latitude,Longitude,url,Description,UserId,CreateDate,color,size) VALUES ('$title', '$latitude', '$longitude','$url','$description',$user_id,$time,'#0000ff','medium')";
//   if(mysqli_query($conn,$insert_query)){
//     $loc_id = mysqli_insert_id($conn);
//     $insert_picture= "INSERT INTO `health_picture` (path,LocationId) VALUES ('$upload','$loc_id')";
//     mysqli_query($conn,$insert_picture);
// }
	echo json_encode(array('result'=>'true'));
}else{
 	echo json_encode(array('result'=>'false'));
	  }
$conn->close();
?>
