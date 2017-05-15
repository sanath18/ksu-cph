<?php
include '../Classes/conn.php';
  if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
    $count=$_SESSION['count'];	
}else{
    header("location: index.php");
    die();
}
$query=NULL;
for ($i=1; $i<=$count; $i++){
    if(isset($_POST[$i])){
        for($j=0;$j<=3;$j++){
$query .= "INSERT into inter (Response,QuestionId,UserId,LocationID) VALUES ('$value',$key,$user_id,$locationId)";
        }
    }
}

foreach($ques_set as $key=>$value){
$query .= "INSERT into health_answer (Response,QuestionId,UserId,LocationID) VALUES ('$value',$key,$user_id,$locationId);";
//$conn->query($query);
}
$conn->multi_query($query);
//sleep(1);
echo "<script type='text/javascript'>alert('success and sent for approval');window.location.replace('usermapedit.php');</script>";
//header("location: usermapedit.php");
unset($_SESSION['LocationId']);
$conn->close();
?>