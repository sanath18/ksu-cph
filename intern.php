<?php
include 'nav_signout.php';
include 'studentsidebar.php';
include 'conn.php';
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
    $_SESSION['Locationid'] = $_GET['locationid'];
}else{
    header("location: index.php");
    die();
}
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
<title>visrepdemo</title>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 



<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="css/stylesheet" href="style.css">
    <link href="css/style3.css" rel="stylesheet" type="text/css">
	
<style>
.main { position: fixed;
  top:92px;
    bottom: 0;
   width:100%
    height: 100%;
	
    }
 .sidebar {
position:fixed;
  display: block;
  top: 82px;
 
  bottom:0;
  z-index: 1000;
  min-height: 100%;
  max-height: none;
  overflow: auto;
}
</style>
	
   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>

<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
  <div class="main col-md-8 col-md-offset-2 col-xs-8 col-lg-8" >
   <form action="interndatacheck.php" role="form" method="POST">
   <h2><center> Intern Activity </center></h2></br>
     <div class="form-group ">
      <label class="control-label " for="date">
       Date
      </label>
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar">
        </i>
       </div>
       <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
      </div>
     </div>
	 <div >
Time: <input type="time" id="time" name = "time" class="form-control" value="">
</div><br>
	<div class="form-group">  <!-- Checkbox Group !-->
		<label class="control-label"><h4>Answer the question 1?</h4></label>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox" name="question1[]" value="option1">option1</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox"  name="question1[]" value="option2">option2</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox"  name="question1[]" value="option3">option3</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox"  name="question1[]" value="option4">option4</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox"  name="question1[]" value="option5">option5</label>
		</div>
	</div>
	<div class="form-group">  <!-- Checkbox Group !-->
		<label class="control-label"><h4>Answer the question 2?</h4></label>
		<div class="checkbox col-md-offset-1">
		  <label>
			<input type="checkbox" name="question2[]" value="option1">option1</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label>
			<input type="checkbox"  name="question2[]" value="option2">option2</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox"  name="question2[]" value="option3">option3</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox"  name="question2[]" value="option4">option4</label>
		</div>
		<div class="checkbox col-md-offset-1">
		  <label><input type="checkbox"  name="question2[]" value="option5">option5</label>
		</div>
	</div>
	 	<div class="form-group">
  <label for="description">Description:</label>
  <textarea class="form-control" rows="5" id="description" name="description" placeholder="description"> </textarea>
</div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary center-block" name="submit" type="submit" id="submit_btn">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
	

</script>
<script>
$(document).ready(function () {

var menu = $('.menu');
var origOffsetY = menu.offset().top;

function scroll() {
    if ($(window).scrollTop() >= origOffsetY) {
        $('.menu').addClass('sticky');
        $('.content').addClass('menu-padding');
    } else {
        $('.menu').removeClass('sticky');
        $('.content').removeClass('menu-padding');
    }


   }

  document.onscroll = scroll;

});
</script>
</body>
</html>
