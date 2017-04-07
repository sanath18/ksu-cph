<?php	
include 'conn.php';
if(isset($_POST['submit']))
	{
	$addcategory = $_POST['addcategory'];
	$jscolor = $_POST['jscolor'];
	$jscolor="#".$jscolor;					
	$query = "INSERT into `health_locationtype` (LocationTypeName,LocationTypeColor) VALUES ('$addcategory' ,'$jscolor')";
if ($conn->query($query));
echo '<script>alert("category added successfully");window.location="adminaddcategory.php";</script>';
	$conn->close();
}
	?>