<?php
include '../Classes/conn.php';
//include '../admin/adminsidebar.php';
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
$html="";
$query=NULL;
$valid = array();
$faculty = $_POST['teacher'];
$queryf = "select FullName from health_user where userid = $faculty;";
$recordf=$conn->query($queryf);
$recordfs=$recordf->fetch_assoc();
$UserName = $recordfs['FullName'];
$students = $_POST['student'];
$count = sizeof($students);
$count = $count-1;
for ($i=0; $i<=$count; $i++){
        $query1 = "Select sfid from intern_studentfaculty where userid=$faculty and studentid=$students[$i]";
        $record=$conn->query($query1);
        if(($record->num_rows)!=0){
            $querys = "select FullName from intern_student where studentid=$students[$i];";
            echo $querys.'<br>';
            $records=$conn->query($querys);
            $recordss=$records->fetch_assoc();
            $UserNames = $recordss['FullName'];
            array_push($valid,$UserNames);
        }else{
        $query .= "insert into intern_studentfaculty(Userid,studentid) values ($faculty,$students[$i]);";
    } 
    }
sleep(1);
$conn->multi_query($query);
$conn->close();
$len=sizeof($valid);
if($len==0){
  //header("location: ../admin/admin.php");
}else{
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
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="css/stylesheet" href="../css/style.css">
    <link href="../css/style3.css" rel="stylesheet" type="text/css">
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>';
$html .= '<h3>Faculty:'.$UserName.'</h3><br>';
$len1=$len-1;
for($i=0;$i<=$len1;$i++){
$html.='<p>'.$valid[$i].' is alredy a student</p>';
}
$html.='</body></html>';
}
echo $html;
?>