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
$LocationId = $_SESSION['LocationId'];
$title = $_POST['title'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$optradio = $_POST['Locationtype'];
$url = $_POST['url'];
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
$location = 'images/images';//initializing path to upload
if(isset($tmp_name)){
if(!empty($tmp_name)){
	if(in_array($extension,$allow)&&in_array($type,$allow_type)&&$size<=$maxsize){
	if(move_uploaded_file($tmp_name,$location.$name)){//moving file to tmp location to desired location
		$s_loc = $location.$name;
  }else{
		echo "there was an error";
	}}else{
	echo "unsupported file format or greater the size limit";
}}}else{
  $s_loc=$_SESSION['path'];
}
	$insert_query = "update `health_location` set Title = '$title',Latitude='$latitude',Longitude='$longitude',LocationType=$optradio,url='$url',Description='$description',UserId=$user_id,Approval=0,color='#000000',size='medium',icon='w' where health_location.LocationId=$LocationId";   
  if(mysqli_query($conn,$insert_query));{
    $insert_picture= "update `health_picture` set Path=$s_loc where LocationId=$LocationId";
    mysqli_query($conn,$insert_picture);
   header("location: usereditquestion.php?LocationId=".$LocationId."&Locationtype=".$optradio);
  }
unset($_SESSION['path']);
mysqli_close($conn);
}
?>