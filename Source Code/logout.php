<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
header("location: login_design.php");
session_start();
$_SESSION["message_logout"]="You have been logged out successfully!!";
?>
