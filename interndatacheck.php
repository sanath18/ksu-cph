<?php
if(!isset($_SESSION)){
    @session_start();
}
include 'conn.php';
$locationid = $_SESSION['Locationid'];
$userid = $_SESSION['id'];
$date = $_POST['date'];
$time =  $_POST['time'];
$question1 = serialize($_POST['question1']);
$question2 = serialize($_POST['question2']);
$description = $_POST['description'];
$sql = "insert into intern_answers(date,time,LocationId,questionId,Userid,answer)values('$date','$time',$locationid,1,$userid,'$question1');";
$sql .= "insert into intern_answers(date,time,LocationId,questionId,Userid,answer)values('$date','$time',$locationid,2,$userid,'$question2');";
$sql .= "insert into intern_answers(date,time,LocationId,questionId,Userid,answer)values('$date','$time',$locationid,3,$userid,'$description');";
$conn -> multi_query($sql);
echo $sql;
sleep(1);
header("location:internmap.php");
unset($_SESSION['Locationid']);
?>