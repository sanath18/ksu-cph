<?php
header('Content-Type: application/json');
include 'conn.php';
$fuserid = $_POST['fuserid'];
$value="[";
$query = "select * from intern_question where userid=$fuserid";
if($result_que = $conn->query($query)){;//or die(mysql_error());
while($res_que=$result_que->fetch_assoc())
{
    if($value !="["){$value.=",";}
  $value .=json_encode(array('questionid'=>$res_que['questionid'],'question'=>$res_que['question'],'optiontype'=>$res_que['optiontype'],'options'=>$res_que['options']));
}
$value.="]";
}
$conn->close();
echo($value);