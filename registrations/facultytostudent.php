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
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<form action="facultytostudentcheck.php" role="form" method="POST">
<div class="container">
<div class = "col-md-12">';
$sql2 = "select * from health_user where UserType=0";
if($record = $conn->query($sql2)){
    $html.='<select id="teacher" name="teacher" class="form-control">';
while($recordset = $record->fetch_assoc()){
$html .= '<option value="'.$recordset['UserId'].'">'.$recordset['FullName'].'</option>';
}
}
$html.='</select><hr>';
$sql3 = "select studentid from intern_student";
$record3 = $conn->query($sql3);
$total=$record3->num_rows;
$perpage = 60;
$tpages = $total/$perpage;
$tpages=ceil($tpages);
$gpage = $_GET['page'];
$start = ($gpage-1)*$perpage;
$sqll = "select * from intern_student ORDER BY FullName limit $start,$perpage;";
if($record = $conn->query($sqll)){
while($recordset = $record->fetch_assoc()){
$html.= '<label class ="checkbox-inline">
    <input type="checkbox" name="student[]" value='.$recordset['StudentId'].' aria-label="...">'.$recordset['FullName'].'
  </label>';
}
}
$html.='<br><hr><p align="center">please submit your changes before clicking next or previous</p><nav aria-label="...">
  <ul class="pager">';
if($gpage==1){
$html.='<li class = "disabled"><a class = "btn disabled" href="?page='.$gpage.'">Previous</a></li>';
$gpage = $gpage+1;
$html.='<li><a href="?page='.$gpage.'">Next</a></li>';
$gpage = $gpage-1;
}
elseif($gpage>1 && $gpage<$tpages){
  $gpage = $gpage-1;
  $html.='<li><a href="?page='.$gpage.'">Previous</a></li>';
  $gpage = $gpage+2;
  $html.='<li><a href="?page='.$gpage.'">Next</a></li>';
  $gpage = $gpage-2;
}
elseif($gpage>=$tpages){
  $gpage=$gpage-1;
  $html.='<li><a href="?page='.$gpage.'">Previous</a></li>';
  $html.='<li class= "disabled"><a class="btn disabled" href="?page='.$gpage.'">Next</a></li>';
}
 $html.='</ul></nav><button for="submit_btn" type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary center-block">submit</button></div>
</div>
</body>
</html>';
echo $html;
?>