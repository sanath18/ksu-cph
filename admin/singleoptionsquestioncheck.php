<?php	
include '../Classes/conn.php';
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
if(isset($_POST['submit_btn']))
	{
	$addquestion = $_POST['addquestion'];
    $addoptions=$_POST['addoptions'];
	$type = $_POST['Locationtype'];
	$ser = serialize($type);
	$query = "INSERT into `health_question` (Question,Description,Type,optiontype) VALUES ('$addquestion','$addoptions','$ser',1)";
	if ($conn->query($query));
	echo "<script type='text/javascript'>alert('Question Add Success!'); window.location.replace('adminaddquestion.php');</script>";
	$conn->close();
}
	?>