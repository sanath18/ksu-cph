<?php
header('Content-Type: application/json');
include 'conn.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$fullname=$_POST['fullname'];
$email = $_POST['email'];		
$query = "select * from health_user where username ='$username'";							
$check = mysqli_query($conn,$query);												
    if(mysqli_num_rows($check)===0)
	{
	//$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	//$password = hash('sha512', $password.$salt);
	$query = "INSERT into `health_user` (UserName, PassWord, Email, FullName) VALUES ('$username', '$password', '$email', '$fullname')";
	if(mysqli_query($conn,$query))
	{
	$user_id = mysqli_insert_id($conn);	
	echo json_encode(array("result"=>'true','user_id'=>$user_id));							
	}else{
	echo json_encode(array("result"=>"false"));
	}
	}else{
	echo json_encode(array('result'=>'username already in use'));
	}
	$conn->close();
	?>
