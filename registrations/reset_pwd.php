<?php 

include '../Nav/nav_create.php';


include '../Classes/conn.php';
$sendemail = $_POST['sendemail']; // need check the email!
$sql = "SELECT * FROM health_user WHERE Email='".$sendemail."'";
//var_dump($sql); 
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html >
  <head>

    <meta charset="UTF-8">
    <title>KSU-CCO|Password Change</title>
    
    <link href="font-awesome.css" rel="stylesheet" type="text/css">  
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
      <link href="../css/style3.css" rel="stylesheet" type="text/css">
      <style type="text/css">
.toLogin{
     margin-left: 150px ;
     background-color: #337ab7; 
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    
    }
      </style>
    </head>
<body>
<?php 
if(empty($row['UserName'])){
?>
<div class="container">
   		<div class="row">
        	<div class="col-md-12">
           
                     <div class="login-container">
                        <h2 class="form-title" align ="center">My KSU-CCO</h2>
                            <h4 align ="center" class="center_title" style="color:black"> We can't find this email, please check it again. </h4>
                           
 
                            <button type="button" class="toLogin" onclick="toBack()">Back</button>
                            
               		 </div><!-- end login-container -->
			
     			 </div><!-- /.col -->
    		</div><!-- /.row -->
		</div><!-- /.container -->

<?php }else{ 

$username = $row['UserName'];
$token = md5("$username");
  
$subject = "ksu-cco: Password reset";
$message = "Please click this link to reset your password: http://localhost/phpp/ksu-cco/reseting_pwd.php?u=$username&t=$token";
if(mail( "$sendemail", "ksu-cco: Password reset","Please click this link to reset your password: http://localhost/phpp/ksu-cco/reseting_pwd.php?t=$token", "From: healthksu@gmail.com")){
	$sql_token = "UPDATE health_user SET token='".$token."' WHERE UserName='".$username."'";
	$result_token = $conn->query($sql_token);
	if(!$result_token){
		echo "Set token error!";
	}
}

?>
<div class="container">
   		<div class="row">
        	<div class="col-md-12">
           
                     <div class="login-container">
                        <h2 class="form-title" align ="center">My ksu-cco</h2>
                            <h3 align ="center" class="center_title" style="color:black"> We’ve sent you a link to change your password </h3>
                            <h5 align ="center">                                        
                                      If you don’t see our email, check your spam folder.
                             </h5>
 
                            <button type="button" class="toLogin" onclick="toLogin()">Login</button>
                            
               		 </div><!-- end login-container -->
			
     			 </div><!-- /.col -->
    		</div><!-- /.row -->
		</div><!-- /.container -->

<?php } ?>
<script>
function toLogin(){
window.location.href="login.php";
}
function toBack(){
window.history.back();
}
</script>
