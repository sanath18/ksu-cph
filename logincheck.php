<?php 
include 'conn.php';
include 'functions.php';
if(!isset($_SESSION)){
	session_start();
}
if(isset($_POST['login_btn']))
{
if(isset($_POST['email']) &&($_POST['pwd']))
{
	$email = input($_POST['email']);
	$password = md5(input($_POST['pwd']));	
	$sql = "SELECT * FROM health_user where Email='$email' and Password='$password'";
	echo $sql;
    $result = $conn->query($sql);
	if(mysqli_num_rows($result)===1)
	{
	$res = $result->fetch_assoc();
    //$salt = $rec['Salt'];
    //$password2 = $rec['PassWord'].'<br>';
	//$password1 = hash('sha512', $password.$salt);

 	//if($password1==$password2)
	 //{
	$user_id = $res['UserId'];
	$_SESSION['id']=$user_id;
	$_SESSION['username']=$res['UserName'];
	$usertype = $res['UserType'];
	$_SESSION['UserType'] = $res['UserType'];
	$_SESSION['Email']=$res['Email'];
	$_SESSION['FullName']=$res['FullName'];
	
	
	//$_SESSION["user"] =serialize($user);
	if($usertype==1){
			header("location: admin.php");
		}
	elseif($usertype==2){
			header("location: internmap.php");
		}
	
	else{
			header("location: usermap.php");
	}
	 }
	//else if{
	//	header("location: login.php?LOGIN_VAL=fail&RES=PasSNomTch");
	//}
	else
	{  
     header("location: login.php?LOGIN_VAL=fail&RES=PasSNomTch");
        
	 }
}
}
$conn->close();
?>