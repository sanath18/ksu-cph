<?php
include 'conn.php';
if(!isset($_SESSION)){
  session_start();
}
$userid = $_SESSION['id'];
$sql_loc = "SELECT * FROM health_location inner JOIN health_picture ON health_location.LocationId=health_picture.LocationId inner join health_locationtype on health_location.LocationType = health_locationtype.LocationTypeId and health_location.UserId = $userid;";
$geojson = array( 'type' => 'FeatureCollection', 'features' => array());
if($record_set_loc=$conn->query($sql_loc)){
while($record_loc=$record_set_loc->fetch_assoc()){
    $LocationId=$record_loc['LocationId'];
    $LocationType = $record_loc['LocationType'];
    $marker = array(
                'type' => 'Feature',
                'features' => array(
                    'type' => 'Feature',
                     "geometry" => array(
                        'type' => 'Point',
                        'coordinates' => array($record_loc['Longitude'],$record_loc['Latitude'])),
                    'properties' => array(
                        'LocationId'=>"".$record_loc['LocationId']."",
                        'title' => "".$record_loc['Title']."",
                        'path'=>"".$record_loc['Path']."",
                        'url' => "".$record_loc['url']."",
                        'LocationType'=> "".$record_loc['LocationType']."",
                        'LocationTypeName'=>"".$record_loc['LocationTypeName']."",
                        'marker-color' =>$record_loc['LocationTypeColor'],
                        'marker-size' => "medium",
                        //'marker-symbol'=> $symbol,
                        'questions'=>array()
                        )
                )
    );
$sql = "select * from health_question left join health_answer on health_question.QuestionId=health_answer.QuestionId where LocationId=$LocationId";
if($record_set=$conn->query($sql)){
while($record=$record_set->fetch_assoc()){
    $id = $record['QuestionId'];
    $ques = $record['Question'];
    $response = $record['Response'];
   // $Type = $record['Type'];
   // $type = unserialize($Type);
    //$optionType = $record['optionType'];
    $que_arr = array('que_id'=>$id,'que'=>$ques,'response'=>$response);
    //$que_arr = array('que_id'=>$id,'que'=>$ques,'response'=>$response,'Type'=>$type,'optionType'=>$optionType);
    array_push($marker['features']['properties']['questions'],$que_arr);
    }
}
json_encode(array_push($geojson['features'], $marker['features']));
}

//$han = fopen('geojson/questions.geojson','w');
$json = json_encode($geojson);
echo $json;
//fwrite($han,$json);
}
$conn->close();
?>