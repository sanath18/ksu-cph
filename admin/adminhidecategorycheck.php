<?php
//including the database connection file
include("../Classes/conn.php");
 
//getting id of the data from url
$LocationTypeId = $_GET['LocationTypeId'];
$status = $_GET['val'];
//deleting the row from table
$result = mysqli_query($conn, "update health_locationtype set status=$status WHERE LocationTypeId=$LocationTypeId");

//redirecting to the display page (admineditquestion.php in our case)
header("Location:admineditcategory.php");
?>