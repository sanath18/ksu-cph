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
	$type = $_POST['Locationtype'];
	$ser = serialize($type);
	$query = "INSERT into `health_question` (Question,Type,optiontype) VALUES ('$addquestion','$ser' ,2)";
	if ($conn->query($query));
	echo "<script type='text/javascript'>alert('Question Add Success!'); window.location.replace('adminaddquestion.php');</script>";
	$conn->close();
}
?>
