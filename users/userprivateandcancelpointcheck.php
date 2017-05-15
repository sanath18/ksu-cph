<?php
include '../Classes/conn.php';
$loc_id = $_POST['id'];					
$query = "update health_location set Approval=3,color='#0000ff',size='medium',icon='u'where LocationId='$loc_id'";
if(mysqli_query($conn,$query))
{
mysqli_query($conn,$sql);		
}					
$conn->close();
?>
