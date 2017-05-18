<?php
include '../Classes/conn.php';
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
?>
<?php
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT QuestionId, Question, Type FROM health_question";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "<tr><td>". $row["QuestionId"]. "</td> ";
		//echo "<td>". $row["Question"]. "</td> " ;
		//echo"<td>". $row["Type"]. "</td>";
		//echo "<td><a href='admineditquestion1.php?id=".$row['QuestionId']."'>Edit</a></td> &nbsp";
//echo "<td><a href='delete.php?id=".$row['QuestionId']."'>delete</a></td></tr>";
	echo "<tr>";
            echo "<td>".$row['QuestionId']."</td>";
            echo "<td>".$row['Question']."</td>";
            echo "<td>".$row['Type']."</td>";    
            echo "<td><a href=\"admineditquestion3.php?QuestionId=$row[QuestionId]\">Edit</a> | <a href=\"admindeletequestion.php?QuestionId=$row[QuestionId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>