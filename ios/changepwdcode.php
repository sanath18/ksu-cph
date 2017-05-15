<?php 
header('Content-Type: application/json');
include 'conn.php';
	$get_email = $_POST['email'];
	$sql = "SELECT * FROM health_user WHERE Email='".$get_email."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$code = rand(1000,9999);
		if(mail( "$get_email", "Temporary Reset Password Identification Code from ksu-cco","Temporary identification code: $code", "From: healthksu@gmail.com")){
			echo json_encode(array('result' =>'true','code'=>"$code"));
		}else{
			echo json_encode(array('result'=>'send email false'));
		}
	}else{
		echo json_encode(array('result'=>'false'));
	}
	


?>