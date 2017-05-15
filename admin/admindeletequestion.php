<?php
//including the database connection file
include("../Classes/conn.php");
 
//getting id of the data from url
$QuestionId = $_GET['QuestionId'];
 
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM health_question WHERE QuestionId=$QuestionId");
 
//redirecting to the display page (admineditquestion.php in our case)
header("Location:admineditquestionnew.php");
?>