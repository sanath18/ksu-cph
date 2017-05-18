<?php
include '../Classes/conn.php';
if(!isset($_SESSION)){
    @session_start();
}
if($_SESSION['id']){
$locationid = $_SESSION['Locationid'];
$studentid = $_SESSION['id'];
$fuserid = $_SESSION['fuserid'];	
}else{
    header("location: ../index.php");
    die();
}
$date = $_POST['date'];
$time =  $_POST['time'];
$sql = "SELECT max(QuestionId) from intern_question";
$result = $conn->query($sql);
$result_set =  $result->fetch_row();
$count = $result_set[0];
$query=null;
$id = array();
$response = array();
for ($i=1; $i<=$count; $i++){
    if(isset($_POST[$i])){
        if(is_array($_POST[$i])){
        $ans = implode(";",$_POST[$i]);
        }else{
        $ans=$_POST[$i];
        }
        array_push($id,$i);
        array_push($response,$ans);
    }
}
$ques_set = array_combine($id,$response);
print_r($ques_set);
foreach($ques_set as $key=>$value){
$query .= "insert into intern_answers(date,time,LocationId,questionId,studentid,Userid,answer)values('$date','$time',$locationid,$key,$studentid,$fuserid,'$value');";
//$conn->query($query);
}
$conn -> multi_query($query);
sleep(1);
header("location:internmap.php");
unset($_SESSION['Locationid']);
$conn->close();
?>