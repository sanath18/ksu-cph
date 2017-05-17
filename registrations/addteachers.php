<?php
include '../nav/nav_signout.php';
include '../admin/adminsidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<title>Carnegie</title> 
</head>
<body onload="input()">
<script>
function input() {
    var nu = prompt("Enter no of students you wish to add. Enter between 1-25");
    if (nu != null) {
      if(nu>=1 && nu <=25){
 window.location.replace('teacher.php?no='+nu);
    }else{
    alert('please enter between 1-25')
    window.location.replace('addteachers.php');
    }
    }
}
</script>
</body>
</html>