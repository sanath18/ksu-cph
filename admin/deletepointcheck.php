<?php
include '../Classes/conn.php';
$loc_id = $_POST['id'];					
$query = "set foreign_key_checks=0;";
$query.="delete from health_location where LocationId = $loc_id;";
$query.="delete from health_answer where LocationId = $loc_id;";
$query.="delete from health_picture where LocationId = $loc_id;";
$query.="set foreign_key_checks=1;";
mysqli_multi_query($conn,$query);		
$conn->close();
?>