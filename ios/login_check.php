<?php
header('Content-Type: application/json');
include 'conn.php';
$loc_a=[];
$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "Select * from health_user where Email='".$email."'and PassWord='".$password."'";
$result = $conn->query($sql);
$count = $result->num_rows;
if($count === 1){
    while($res = $result->fetch_assoc()){
        $user_id= $res['UserId']; 
        //use salt for registration 
        //$salt = $res['salt'];  
        $UserName = $res['UserName']; 
        //$PassWord = $res['PassWord'];
        $UserType= $res['UserType'];
        $FullName=$res['FullName'];
        $Email=$res['Email'];
    }
    echo json_encode(array('result' => 'true','user_id' => $user_id,'UserName'=> $UserName,'UserType'=> $UserType,'FullName'=>$FullName,'Email'=>$Email));
    $conn->close();
    }else{				
	echo json_encode(array('result' => 'Wrong password or user id'));
    $conn->close();
	}
?>