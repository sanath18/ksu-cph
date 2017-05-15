<?php
$html="";
include '../Nav/nav_signin.php';
include '../Classes/conn.php';
$html.='
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
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="css/stylesheet" href="../css/style.css">
    <link href="../css/style3.css" rel="stylesheet" type="text/css">
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<div class="container">
<div class = "col-md-12">';
$sqll = "select * from intern_student";
if($record = $conn->query($sqll)){
while($recordset = $record->fetch_assoc()){
$html.= '<label class ="checkbox-inline">
    <input type="checkbox" name="student" value='.$recordset['StudentId'].' aria-label="...">'.$recordset['UserName'].'
  </label>';
}
}
$html.='<br><br>';
$sql2 = "select * from health_user where UserType=0";
if($record = $conn->query($sql2)){
    $html.='<select id="teacher" name="teacher" class="form-control">';
while($recordset = $record->fetch_assoc()){
$html .= '<option value="'.$recordset['UserId'].'">'.$recordset['UserName'].'</option>';
}
}
$html.='</select><hr><button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">submit</button></div>
</div>
</body>
</html>';
echo $html;
?>