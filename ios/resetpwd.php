<?php 
header('Content-Type: application/json');
	include 'conn.php';
	$result = $_POST['result'];
	$new_pwd = $_POST['password'];
	$email = $_POST['email'];

	if($result == "true" && !empty($email)){
		$sql = "UPDATE health_user SET Password='".md5("$new_pwd")."' WHERE Email='".$email."'";
		$result_reset = $conn->query($sql);
		if($result_reset){
			echo json_encode(array('result'=>'true'));
		}else{
			echo json_encode(array('result'=>'false'));
		}
	}else{
		echo json_encode(array('result'=>'false: email empty'));
	}


?>