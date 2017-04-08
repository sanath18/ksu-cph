<?php
	include ("nav_signout.php");
    include ("conn.php");
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
<link rel="css/stylesheet" href="style.css">
<link href="css/style3.css" rel="stylesheet" type="text/css">
<form action="usereditquestionscheck.php" method="post">
<div class = "row"><div class = "col-md-10 col-md-offset-1">';
//$locationId = $_GET['loc_id'];
$locationId=$_SESSION['LocationId'];
$sql = "SELECT LocationType FROM `health_location` where LocationId = $locationId";                     
$result_loc = $conn->query($sql); // or die(mysql_error());
$res_loc = $result_loc->fetch_assoc();
$LocationType = $res_loc['LocationType'];
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
    if(!empty($res_que['Response'])){
$respone = $res_que['Response'];
    }else{
        $respone="";
    }
$que_type=$res_que['Type'];
$ques_type=@unserialize($que_type);
if(@in_array($LocationType,$ques_type)){
if($res_que['optionType']==1){
$res = $res_que['Description'];
$dropdown='<select id="'.$res_que['QuestionId'].'" name="'.$res_que['QuestionId'].'" class="form-control">';
$e_file = explode(';',$res);
foreach($e_file as $ef){
if($respone==$ef){
$dropdown .= '<option value="'.$ef.'" selected="selected">'.$ef.'</option>';
    }else{
$dropdown .= '<option value="'.$ef.'">'.$ef.'</option>';
}}
$dropdown.='</select>';
$html.='<b>'.$res_que['Question'].'</b><br><br>'.$dropdown.'<hr>';
$dropdown='';//reset dropdown
}else{
$html.='<b>'.$res_que['Question'].'</b><input type="text" class="form-control"  id="'.$res_que['QuestionId'].'" name="'.$res_que['QuestionId'].'"  value ="'.$respone.'"placeholder="Answer"><hr>';
}
}
}
$html.='<button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">update</button></div></div>';
echo $html;
?>