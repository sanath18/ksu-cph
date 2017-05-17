<?php
function input($input){
$input = trim($input);
$input = addslashes($input);
$input = htmlspecialchars($input);
return $input;
}
function type(){
include '../Classes/conn.php';
$sqll = "select * from health_locationtype where status=1";
if($record = $conn->query($sqll)){
while($recordset = $record->fetch_assoc()){
echo '<label class ="checkbox-inline">
    <input type="checkbox" name="Locationtype[]" value='.$recordset['LocationTypeId'].' aria-label="...">'.$recordset['LocationTypeName'].'
  </label>';
}
}
}
?>