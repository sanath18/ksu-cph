<?php	
include '../Classes/conn.php';
include '../Classes/functions.php';
if(!isset($_SESSION)){
  session_start();
}
if(isset($_POST['register_btn']))
	{
	$username = input($_POST['username']);
	$password = md5(input($_POST['password']));
	$email = input($_POST['email']);
	$fullname=input($_POST['fullname']);			
	$query = "select * from health_user where email ='$email'";				
	$check = mysqli_query($conn,$query);													
    if(mysqli_num_rows($check)===0)
	{
	//$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	//$password = hash('sha512', $password.$salt);
	$query = "INSERT into `health_user` (UserName, PassWord, Email, FullName) VALUES ('$username', '$password', '$email', '$fullname')";
	$result = mysqli_query($conn,$query);
	if($result)
	{
	header("location: login.php?LOGIN_VAL=true&RES=success");								
	}
	}					
	else
	{
	header("location: userregistration.php?LOGIN_VAL=fail&RES=userexist");
	}
	}
	$conn->close();
	?>
