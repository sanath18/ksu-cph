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
$sql = "SELECT max(QuestionId) from health_question";
$result = $conn->query($sql);
$result_set =  $result->fetch_row();
$count = $result_set[0];
$query=null;
$id = array();
$response = array();
for ($i=1; $i<=$count; $i++){
    if(isset($_POST[$i])){
        $ans=$_POST[$i];
        array_push($id,$i);
        array_push($response,$ans);
    }
}
$ques_set = array_combine($id,$response);
$query_valid = "select AnswerId from health_answer where LocationID=$locationId;";
$result = $conn->query($query_valid);
if ($result->num_rows > 0){
$sql = "delete from health_answer where LocationId=$locationId;";
$conn->query($sql);
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