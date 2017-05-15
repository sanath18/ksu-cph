<?php
include '../Nav/nav_signin.php';
include '../Classes/conn.php';
//include '../admin/adminsidebar.php';
$count = $_GET['no'];
$_SESSION['count']=$count;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- <link rel="icon" href="favicon.ico">-->
	<!--<base target="_blank">-->
<title>Carnegie</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="css/stylesheet" href="../css/style.css">
    <link href="../css/style3.css" rel="stylesheet" type="text/css">
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<form action="studentcheck.php" role="form" method="POST">
<div class="container">
<h3>choose faculty</h3>
<?php
$sql2 = "select * from health_user where UserType=0";
echo '<div class = "col-md-12">';
if($record = $conn->query($sql2)){
    echo '<select id="teacher" name="teacher" class="form-control"><option value="0">No faculty</option>';
while($recordset = $record->fetch_assoc()){
echo '<option value="'.$recordset['UserId'].'">'.$recordset['UserName'].'</option>';
}
}
echo '</select><hr></div>
<h2>Enter student details<h2><hr>';
for ($i=0;$i<$count;$i++){
echo '<div class = "col-md-4"><input name = "'.$i.'[]" type="text" class="form-control" placeholder="userid">
</div>
<div class = "col-md-4">
<input name = "'.$i.'[]" type="text" class="form-control" placeholder="Name">
</div>
<div class = "col-md-4">
<input name = "'.$i.'[]" type="text" class="form-control" placeholder="Email"><hr>
</div>';
}
echo '<hr><button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">submit</button>';
?>
</form>
</div>
</body>
</html>