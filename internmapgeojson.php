<?php
include 'conn.php';
$sql_loc = "SELECT * FROM intern_location";
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