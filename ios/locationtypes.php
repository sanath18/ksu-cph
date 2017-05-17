<?php
header('Content-Type: application/json');
include 'conn.php';
$value="[";
    $sql="SELECT * FROM health_locationtype where status = 1";
    if($result = $conn->query($sql));{
    while($record_loc=$result->fetch_assoc()){
        if($value !="["){$value.=",";}
        $value .= json_encode(array('LocationTypeId'=>$record_loc['LocationTypeId'],'LocationTypeName'=>$record_loc['LocationTypeName'],'LocationTypeColor'=>$record_loc['LocationTypeColor']));
    }
    $value.="]";
}
 $conn->close();
 echo($value);
?>