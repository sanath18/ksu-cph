<?php
include '../Classes/conn.php';
  if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];	
}else{
    header("location: index.php");
    die();
}
if(isset($_POST['submit_btn'])){
$title = $_POST['title'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
//$optradio = $_POST['optradio'];
$url = $_POST['url'];
$time = time();
$description = $_POST['description'];
$name = $_FILES['image']['name'];//grab name of location
$size = $_FILES['image']['size'];
$type = $_FILES['image']['type'];
$tmp_name = $_FILES['image']['tmp_name'];
$maxsize=2097152;
$extension = explode('.',$name);
$extension = end($extension);
//returns the last element of array which is file extension
$allow=array('jpg','jpeg','png','pneg');//array to declare file type to allow
$allow_type=array('image/jpeg','image/jpg','image/png','image/pneg');
//tmp name or tmp location of the uploaded file
$location = '../images/images/';//initializing path to upload
if(isset($tmp_name)){
if(!empty($tmp_name)){
	if(in_array($extension,$allow)&&in_array($type,$allow_type)&&$size<=$maxsize){
	if(move_uploaded_file($tmp_name,$location.$name)){//moving file to tmp location to desired location
		$s_loc = $location.$name;
  }else{
		echo "there was an error";
	}}else{
	echo "unsupported file format or greater the size limit";
}}else{
$s_loc=NULL;
}
}else{
$s_loc=NULL;
}
	$insert_query = "INSERT into `intern_location` (Title,Latitude,Longitude,url,Description,UserId,Path,CreateDate,color,size) VALUES ('$title', '$latitude', '$longitude','$url','$description',$user_id,'$s_loc',$time,'#0000ff','medium')";
  if(mysqli_query($conn,$insert_query));{
    // $loc_id = mysqli_insert_id($conn);
    // $_SESSION['LocationId'] = $loc_id;
    // $insert_picture= "INSERT INTO `health_picture` (Path,LocationId) VALUES ('$s_loc','$loc_id')";
    // mysqli_query($conn,$insert_picture);
    echo "<script>alert('point add success');window.location.replace('createinternshipsmap.php');</script>";
  //header("location: createinternshipsmap.php");
  }
    mysqli_close($conn);
		}
?>