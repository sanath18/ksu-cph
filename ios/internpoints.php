<?php
header('Content-Type: application/json');
include 'conn.php';
$value="[";
    $sql="SELECT * FROM intern_location";
    if($result = $conn->query($sql));{
    while($record_loc=$result->fetch_assoc()){
        if($value !="["){$value.=",";}
        $value .= json_encode(array('Latitude'=>$record_loc['Latitude'],'Longitude'=>$record_loc['Longitude'],'LocationId'=>"".$record_loc['LocationId']."",'title' => "".$record_loc['Title']."",'path'=>"http://parkapps.kent.edu/ksu-cph/".$record_loc['Path']."",'url' => "".$record_loc['url']."",'LocationType'=> "".$record_loc['LocationType']."",'marker-color' =>"#ff6600",'marker-size' => "medium",'marker-symbol'=> "o"));
    }
    $value.="]";
}
 $conn->close();
 echo($value);
?>