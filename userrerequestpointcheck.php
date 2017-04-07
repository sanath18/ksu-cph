<?php
include 'conn.php';
$loc_id = $_POST['id'];					
$query = "update health_location set Approval=4,color='#333300',size='medium',icon='r'where LocationId='$loc_id'";
mysqli_query($conn,$query);				
$conn->close();
?>
