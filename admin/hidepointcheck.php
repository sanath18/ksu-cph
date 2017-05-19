<?php
include '../Classes/conn.php';
$loc_id = $_POST['id'];					
$query = "update health_location set Approval=5,color='#000000',size='medium',icon='n'where LocationId='$loc_id'";
if(mysqli_query($conn,$query))
{
mysqli_query($conn,$sql);		
}					
$conn->close();
?>
