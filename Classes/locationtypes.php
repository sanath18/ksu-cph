<?php
include 'conn.php';
$sql = "select * from health_locationtype where status=1";
$locationtype = array();
$locationtypeid=array();
if($record=$conn->query($sql));
{while($record_set = $record->fetch_assoc())
{
   array_push($locationtypeid,$record_set['LocationTypeId']);
   array_push($locationtype,$record_set['LocationTypeName']);
}
$locationarray = json_encode(array_combine($locationtypeid,$locationtype));
$locationtypeidarray = json_encode($locationtypeid);
}
?>