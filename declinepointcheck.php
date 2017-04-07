<?php
include 'conn.php';
$loc_id = $_POST['id'];					
$query = "update health_location set Approval=2,color='#ff0000',size='medium',icon='d'where LocationId='$loc_id'";
if(mysqli_query($conn,$query))
{
mysqli_query($conn,$sql);		
}					
$conn->close();
?>
