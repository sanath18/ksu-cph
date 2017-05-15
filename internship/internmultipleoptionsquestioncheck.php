<?php	
include '../Classes/conn.php';
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: index.php");
    die();
}
if(isset($_POST['submit_btn']))
	{
	$addquestion = $_POST['addquestion'];
    $addoptions=$_POST['addoptions'];
	$query = "INSERT into `intern_question` (Question,options,optiontype,userid) VALUES ('$addquestion','$addoptions',4,$user_id)";
	if ($conn->query($query));
	echo "<script type='text/javascript'>alert('Question Add Success!'); window.location.replace('addintershipquestion.php');</script>";
	$conn->close();
}
	?>
