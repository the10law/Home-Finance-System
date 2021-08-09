<?php
session_start();
if($_SESSION['logged_in']!=true)
{
header("location: login_design.php");
die;
}
require ('dbconnect.php');
$con=$_SESSION['con'];
$qry1="select * from balance";
$res1=mysqli_query($con,$qry1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/home_finance_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Home Finance | Balance</title>
<!-- InstanceEndEditable -->
<link rel="shortcut icon" href="logo.png"  type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
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
</style>
<!-- InstanceBeginEditable name="head" -->
<link href="file:///C|/xampp/htdocs/Feed_Back/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable --><!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
</head>

<body>
<!-- Main container of the webpage -->
<div class="container-fluid">
<header style="text-align:center">
<p style="padding-top:1%;">Home Finance</p>
</header></div>
<!-- Navbar div -->
<div class="container" style="padding-top:0.4%">
<nav class="navbar navbar-inverse">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#data">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button>
<a class="navbar-brand" href="home.php">Chandan's Family</a></div>
<div class="collapse navbar-collapse" id="data">
<ul class="nav navbar-nav">

<li class="active"><a href="home.php">Home</a></li>
<li ><a href="expense_design.php">Expense</a></li>
<li><a href="income_design.php">Income</a></li>
<li><a href="withdrawal_design.php">Withdrawal</a></li>
<li><a href="balance_design.php">Balance</a></li>
<li><a href="report_design.php">Report</a></li>
<li class="active"><a href="logout.php"  >Logout</a></li>
</ul>
</div>
</nav>
<hr /><hr />
</div>



<!-- InstanceBeginEditable name="EditRegion3" -->
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 3px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.sectionContainer
{
width:100%;
margin-top:15px;
font-size:16px;
}
.contentSection
{
width:100%;

}
.leftArticle
{
width:50%;
float:left;
padding-left:7%;
padding-right:5%;
}
.rightArticle
{
width:50%;
float:left;
padding-left:5%;
padding-right:5%;
}
</style>

<section class="sectionContainer">
<div class="contentSection">
<article class="leftArticle">
<?php
if(isset($_SESSION['balance_message']))
{
echo "<center><b class=alert-info><h4>".$_SESSION['balance_message']."</h4></b></center>";
}
?>

<form method="post" action="store_balance.php">
<h1><b>Add new member</b></h1>
Member name<input type="text" required name="name" class="form-control" placeholder="enter the new name"></br>
Balance Amount<input type="text" required name="amt" class="form-control" placeholder="enter the balance amount"><br />
<button class="alert-danger form-control" type="reset">Reset</button>
<br />
<button class="alert-info  form-control col-lg-10 " type="submit" name="login">Add New Member</button>
</form>
</article>
<article class="rightArticle">
<table>
<tr>
<th>Member Name</th>
<th>Balance Amount</th>
</tr>
<?php
while ($row=mysqli_fetch_array($res1))
{
?>
<tr>
<td><?php echo $row['person'];?></td>
<td><?php echo $row['balance_amt'];?></td>
</tr>
<?php
}
?>
</table>
</article>
</div>
</section>

<!-- InstanceEndEditable -->
<footer style="text-align:center">
<p style="padding-bottom:10px;">Developed By: Rahulkumar Singh</p>
</footer>
</div>

</body>
<!-- InstanceEnd --></html>
