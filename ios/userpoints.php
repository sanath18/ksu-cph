<?php
header('Content-Type: application/json');
include 'conn.php';
$UserId = $_POST['UserId'];
$value="[";
    $sql="SELECT * FROM health_location left JOIN health_picture ON health_location.LocationId=health_picture.LocationId where health_location.UserId=$UserId;";
    if($result = $conn->query($sql));{
    while($record_loc=$result->fetch_assoc()){
        if($value !="["){$value.=",";}
        $value .= json_encode(array('Latitude'=>$record_loc['Latitude'],'Longitude'=>$record_loc['Longitude'],'LocationId'=>"".$record_loc['LocationId']."",'title' => "".$record_loc['Title']."",'path'=>"http://parkapps.kent.edu/ksu-cph/".$record_loc['Path']."",'url' => "".$record_loc['url']."",'LocationType'=> "".$record_loc['LocationType']."",'Approval'=>"".$record_loc['Approval']."",'marker-color' =>$record_loc['color']));
    }
    $value.="]";
}
 $conn->close();
 echo($value);
?>