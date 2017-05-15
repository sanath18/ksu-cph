<?php
	include ("../Nav/nav_signout.php");
    include ("../Classes/conn.php");
    if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}else{
    header("location: index.php");
    die();
}
$html='';
$dropdown='';
$html.='
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>health</title>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<link rel="css/stylesheet" href="../css/style.css">
<link href="../css/style3.css" rel="stylesheet" type="text/css">
<form action="usereditquestionscheck.php" method="post">
<div class = "row"><div class = "col-md-10 col-md-offset-1">';
//$locationId = $_GET['loc_id'];
$locationId=$_GET['LocationId'];
$LocationType = $_GET['Locationtype'];
//$query_valid = "select AnswerId from health_answer where LocationID=$locationId";
//$result = $conn->query($query_valid);
//if ($result->num_rows > 0){
//$query = "SELECT * FROM health_question right join health_answer on health_question.QuestionId = health_answer.QuestionId where health_answer.LocationID = $locationId";
//}else{//if no response in health_answer
    $query = "select * from health_question";
//}
$result_que = $conn->query($query);//or die(mysql_error());
while($res_que=$result_que->fetch_assoc())
{
$que_type=$res_que['Type'];
$ques_type=@unserialize($que_type);
if(@in_array($LocationType,$ques_type)){
  $questionid=$res_que['QuestionId'];
  $question=$res_que['Question'];
switch($res_que['optionType']){
case 1:
  $res = $res_que['Description'];
  $optionslist='<select id="'.$questionid.'" name="'.$questionid.'" class="form-control">';
  $e_file = explode(';',$res);
  foreach($e_file as $ef){
  $optionslist .= '<option value="'.$ef.'">'.$ef.'</option>';
    }
  $optionslist.='</select>';
  $html.='<b>'.$question.'</b><br><br>'.$optionslist.'<hr>';
  $optionslist='';//reset dropdown
break;
case 2:
  $html.='<b>'.$question.'</b><input type="text" class="form-control"  id="'.$questionid.'" name="'.$questionid.'" placeholder="Answer"><hr>';
break;
case 3:
  $res = $res_que['Description'];
  $e_file = explode(';',$res);
  foreach($e_file as $ef){
    $optionslist .= '<div class="radio"><label><input type="radio" id="'.$questionid.'" name="'.$questionid.'" value="'.$ef.'">'.$ef.'</label></div>';
  }
  $html.='<b>'.$question.'</b>'.$optionslist.'<hr>';
  $optionslist='';//reset dropdown
break;
case 4:
  $res = $res_que['Description'];
  $e_file = explode(';',$res);
  foreach($e_file as $ef){
    $optionslist .= '<div class="checkbox"><label><input type="checkbox" id="'.$questionid.'" name="'.$questionid.'[]'.'" value="'.$ef.'">'.$ef.'</label></div>';
  }
  $html.='<b>'.$question.'</b>'.$optionslist.'<hr>';
  $optionslist='';//reset dropdown
break;
}
}
}
$html.='<button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">update</button></div></div></form>';
echo $html;
?>