<?php 
include '../Classes/conn.php';
include '../Classes/functions.php';
if(!isset($_SESSION)){
	session_start();
}
if(isset($_POST['login_btn']))
{
if(isset($_POST['email']) &&($_POST['pwd']))
{
	$email = input($_POST['email']);
	$password = md5(input($_POST['pwd']));	
	$sql = "SELECT * FROM intern_student where Email='$email' and Password='$password'";
    $result = $conn->query($sql);
	if(mysqli_num_rows($result)===1)
	{
	$res = $result->fetch_assoc();
    //$salt = $rec['Salt'];
    //$password2 = $rec['PassWord'].'<br>';
	//$password1 = hash('sha512', $password.$salt);

 	//if($password1==$password2)
	 //{
	$user_id = $res['StudentId'];
	$_SESSION['id']=$user_id;
	$_SESSION['username']=$res['UserName'];
	$_SESSION['Email']=$res['Email'];
	$_SESSION['FullName']=$res['FullName'];
    header("location: ../internship/internmap.php");
	 }
	//else if{
	//	header("location: studentlogin.php?LOGIN_VAL=fail&RES=PasSNomTch");
	//}
	else
	{  
     header("location: studentlogin.php?LOGIN_VAL=fail&RES=PasSNomTch");
        
	 }
}
}
$conn->close();
?>