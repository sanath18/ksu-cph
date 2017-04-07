<?php
header('Content-Type: application/json');
include 'conn.php';
$LocationId = $_POST['LocationId'];
$sql_loc = "SELECT * FROM health_location left JOIN health_picture ON health_location.LocationId=health_picture.LocationId where health_location.LocationId = $LocationId;";
if($record_set_loc=$conn->query($sql_loc)){
while($record_loc=$record_set_loc->fetch_assoc()){
    $LocationId=$record_loc['LocationId'];
    $marker = array('title' => "".$record_loc['Title']."",
                    'url' => "".$record_loc['url']."",
                    'questions'=>array()
    );
$sql = "select * from health_question left join health_answer on health_question.QuestionId=health_answer.QuestionId where LocationId=$LocationId";
if($record_set=$conn->query($sql)){
while($record=$record_set->fetch_assoc()){
    $id = $record['QuestionId'];
    $ques = $record['Question'];
    $response = $record['Response'];
    $Type = $record['Type'];
    $que_arr = array('que_id'=>$id,'que'=>$ques,'response'=>$response,'Type'=>$Type);
    array_push($marker['questions'],$que_arr);
    }
}
}
echo json_encode($marker);
}
$conn->close();
?>