<?php
function input($input){
$input = trim($input);
$input = addslashes($input);
$input = htmlspecialchars($input);
return $input;
}
?>