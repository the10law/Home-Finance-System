<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
    }
	}
	
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Finance | Login</title>
<link rel="shortcut icon" href="logo.png"  type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css" />

<script type="text/javascript">
$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
</script>
<style>
header{background-color:#6DCCEB; width:100%; height:50px; font-size:18px; font-family:Georgia, "Times New Roman", Times, serif; border-radius:5px;}
span{background-color:black;}
footer{background-color:#6DCCEB;height:35px; font-family:Arial, Helvetica, sans-serif; font-size:18px; position:fixed;left:5%; bottom:0; width:90%; border-bottom-color:#62ADDB; border-radius:5px;}
</style></head>

<body>
<!-- Main container of the webpage -->
<div class="container-fluid">
<header style="text-align:center">
<p style="padding-top:1%;">Home Finance</p>
</header></div>
<!-- Navbar div -->


<br />
<br />
<br /><br />
<center>
<?php 
if(!empty($_SESSION['message_fail']))
{
$msg=$_SESSION['message_fail'];
echo "<h4><b class=alert-danger> Error:</b><b class=alert-warning>".$msg."</b></h4?<br>";
}

if(!empty($_SESSION['message_logout']))
{
$msg1=$_SESSION['message_logout'];
echo "<h4><b class=alert-success> Success:</b><b class=alert-warning>".$msg1."</b><br></h4>";
}
?>
<br /><br /><br />
<b class="alert-warning ">WARNING:</b>You are required to be an authorised user in order to access the database. Please provide your login credentials below to gain acces to the database!!<br />
<div class="container" style="width:500px; height:300px;">
<form method="post" action="login_design.php">
Username<input type="text" placeholder="Enter your Username" required name="uname" class="form-control"/>
<br />
Password<input type="password" placeholder="Enter Password" required name="pass" class="form-control"/>
<br />
<button class="alert-danger form-control" type="reset">Reset</button>
<button class="alert-info  form-control col-lg-10 " type="submit" name="login">Log In</button>
</form>
</div>
</center>

<footer style="text-align:center">
<p style="padding-bottom:10px;">Survey Developed By: Rahulkumar Singh</p>
</footer>


</div>
</body>
</html>
