<?php
include '../Classes/conn.php';
if(!isset($_SESSION)){
  session_start();
}
if(isset($_SESSION['id'])){
    $sid = $_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
$userid = array();
$sql = "select userid from intern_studentfaculty where studentid = 3";
$records = $conn->query($sql);
while($records_set = $records->fetch_assoc()){
array_push($userid,$records_set['userid']);
}
$fuserid=implode(" or ",$userid);
$sql_loc = "SELECT * FROM intern_location where UserId=$fuserid";
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
                        'path'=>"".$record_loc['path']."",
                        'url' => "".$record_loc['url']."",
                        'userid' => "".$record_loc['UserId']."",
                        //'LocationType'=> "".$record_loc['LocationType']."",
                        //'LocationTypeName'=>"".$record_loc['LocationTypeName']."",
                        'marker-color' =>$record_loc['color'],
                        'marker-size' => "medium"
                        //'marker-symbol'=> $symbol,
                       // 'questions'=>array()
                        )
                )
    );
json_encode(array_push($geojson['features'], $marker['features']));
}

//$han = fopen('geojson/questions.geojson','w');
$json = json_encode($geojson);
echo $json;
//fwrite($han,$json);
}
$conn->close();
?>