<?php
include '../Classes/conn.php';
$loc_id = $_POST['id'];					
$query = "update health_location set Approval=6,color='#00ff00',size='medium',icon='s'where LocationId='$loc_id'";
if(mysqli_query($conn,$query))
{
mysqli_query($conn,$sql);		
}					
$conn->close();
?>
