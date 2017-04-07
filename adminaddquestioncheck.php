<?php	
include 'conn.php';
if(isset($_POST['submit_btn']))
	{
	$addquestion = $_POST['addquestion'];
	$type = $_POST['Locationtype'];
	$ser = serialize($type);
	$query = "INSERT into `health_question` (Question,Type) VALUES ('$addquestion' ,'$ser')";
	if ($conn->query($query));
	echo "<script type='text/javascript'>alert('Question Add Success!'); window.location.replace('adminaddquestion.php');</script>";
	$conn->close();
}
	?>
