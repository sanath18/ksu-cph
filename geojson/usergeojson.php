<?php
include '../Classes/conn.php';
if(!isset($_SESSION)){
    @session_start();
}
$user_id=$_SESSION['id'];
$sql_loc = "SELECT * FROM health_location left JOIN health_picture ON health_location.LocationId=health_picture.LocationId where health_location.UserId=$user_id;";
$geojson = array( 'type' => 'FeatureCollection', 'features' => array());
if($record_set_loc=$conn->query($sql_loc)){
while($record_loc=$record_set_loc->fetch_assoc()){
    $LocationId=$record_loc['LocationId'];
    $marker = array(
                'type' => 'Feature',
                'features' => array(
                    'type' => 'Feature',
                     "geometry" => array(
                        'type' => 'Point',
                        'coordinates' => array($record_loc['Longitude'],$record_loc['Latitude'])),
                    'properties' => array(
                        'LocationId'=>"".$record_loc['LocationId']."",
                        'Approval'=>"".$record_loc['Approval']."",
                        'title' => "".$record_loc['Title']."",
                        'path'=>"".$record_loc['Path']."",
                        'url' => "".$record_loc['url']."",
                        'LocationType'=> "".$record_loc['LocationType']."",
                        'marker-color' =>"".$record_loc['color']."",
                        'marker-size' => "".$record_loc['size']."",
                        'marker-symbol'=> "".$record_loc['icon']."",
                        //'questions'=>array()
                        )
                )
    );
// $sql = "select * from health_question left join health_answer on health_question.QuestionId=health_answer.QuestionId where LocationId=$LocationId";
// if($record_set=$conn->query($sql)){
// while($record=$record_set->fetch_assoc()){
//     $id = $record['QuestionId'];
//     $ques = $record['Question'];
//     $response = $record['Response'];
//     $Type = $record['Type'];
//     $optionType = $record['optionType'];
//     $que_arr = array('que_id'=>$id,'que'=>$ques,'response'=>$response,'Type'=>$Type,'optionType'=>$optionType);
//     json_encode(array_push($marker['features']['properties']['questions'],$que_arr));
//     }
// }
json_encode(array_push($geojson['features'], $marker['features']));
}

//$han = fopen('geojson/questions.geojson','w');
$json = json_encode($geojson);
echo $json;
//fwrite($han,$json);
}
$conn->close();
?>