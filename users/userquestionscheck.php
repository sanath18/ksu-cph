<?php
include '../Classes/conn.php';
  if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
    $locationId = $_SESSION['LocationId'];	
}else{
    header("location: index.php");
    die();
}
$response = array();
for ($i=1; $i<=21; $i++){
    if(isset($_POST[$i])){
        $ans=$_POST[$i];
    }else{
        $ans='';
    }
    array_push($response,$ans);
}
for ($j=0;$j<=20;$j++){
$res=$response[$j];
$r=$j+1;
$query = "INSERT into health_answer (Response,QuestionId,UserId,LocationID) VALUES ('$res',$r,$user_id,$locationId)";
mysqli_query($conn,$query);
header("location: usermap.php");
}
unset($_SESSION['LocationId']);
$conn->close();
?>