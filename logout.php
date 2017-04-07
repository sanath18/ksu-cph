<?php
session_start();
//$user_id=$_SESSION['id'];
//unlink('geojson/'.$user_id.'questions.geojson');
session_destroy();
header("location: index.php");
?>