<?php
//including the database connection file
include("conn.php");
 
//getting id of the data from url
$LocationTypeId = $_GET['LocationTypeId'];
 
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM health_locationtype WHERE LocationTypeId=$LocationTypeId");
 
//redirecting to the display page (admineditquestion.php in our case)
header("Location:admineditcategory.php");
?>