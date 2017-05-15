<?php
include '../Classes/conn.php';
$loc_id = $_POST['id'];					
$query = "update health_location set Approval=0,color='#000000',size='medium',icon='w'where LocationId='$loc_id'";
mysqli_query($conn,$query);				
$conn->close();
?>
