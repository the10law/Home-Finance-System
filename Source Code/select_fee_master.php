<?php
session_start();
if($_SESSION['logged_in']!=true)
{
header("location: login_view.php");
die;
}
require ('dbconnect.php');
$con=$_SESSION['con'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="file:///C|/xampp/htdocs/Grace School Management/Templates/home_finance_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Grace | Select Fee Master</title>
<!-- InstanceEndEditable -->
<link rel="shortcut icon" href="file:///C|/xampp/htdocs/Grace School Management/Web Pages/logo2.png"  type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="file:///C|/xampp/htdocs/Grace School Management/bootstrap-3.3.7/dist/css/bootstrap.min.css" />
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
header{background-color:#6DCCEB; width:100%; height:60px;  font-family:Georgia, "Times New Roman", Times, serif; border-radius:5px;}
span{background-color:black;}
footer{background-color:#6DCCEB;height:35px; font-family:Arial, Helvetica, sans-serif; font-size:18px; position:fixed;left:5%; bottom:0; width:90%; border-bottom-color:#62ADDB; border-radius:5px;}
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable --><!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
</head>

<body style="font-family:Comic Sans MS;">
<!-- Main container of the webpage -->
<div class="container-fluid">
<header>
<div style=" float:left; padding-left:8px; padding-top:6px;">
<a href="file:///C|/xampp/htdocs/Grace School Management/Web Pages/home.php"> <img src="file:///C|/xampp/htdocs/Grace School Management/Web Pages/logo.png" width="200" height="50"> </a>
</div>
<div style="float:center">
<p style="padding-top:1%; text-align:center; font-size:26px; padding-right:16%;">Grace School Management </p>
</div>
</header></div>
<!-- Navbar div -->
<div class="container" style="padding-top:0.4%">
<nav class="navbar navbar-inverse">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#data">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="home.php">Grace</a>
</div>
<div class="collapse navbar-collapse" id="data">
<ul class="nav navbar-nav">

<li ><a href="home.php">Home</a></li>
<li ><a href="stud_mas_view.php">Student Master</a></li>
<li><a href="fee_mas_view.php">Fee Master</a></li>
<li><a href="pay_fees_view.php">Pay Fees</a></li>
<li><a href="">Exam Marks</a></li>
<li><a href="">Report Generator</a></li>
<li><a href="">User/Cashier Access</a></li>
<li class="active"><a href="logout.php"  >Logout</a></li>
</ul>
</div>
</nav>
<hr /><hr />
</div>



<!-- InstanceBeginEditable name="EditRegion3" -->OptionalRegion1<!-- InstanceEndEditable -->

</div>

</body>
<!-- InstanceEnd --></html>
