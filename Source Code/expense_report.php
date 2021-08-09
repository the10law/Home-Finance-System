<?php
session_start();
if($_SESSION['logged_in']!=true)
{
header("location: login_design.php");
die;
}
require ('dbconnect.php');
$con=$_SESSION['con'];
$qry1="select * from login";
$result = mysqli_query($con,$qry1)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/home_finance_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Home Finance | Expense Report</title>
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
<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
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
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="home.php">Chandan's Family</a>
</div>
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



<!-- InstanceBeginEditable name="EditRegion3" --><p >
<h1 style="text-align:center;" >Generate Report:</h1>
</p>
<center>
<table>
<tr>
<td>
<div style="padding-left:10%; width:200px; height:200px;">
<b><h3>Date</h3></b>
<form action="ex_report.php" method="post">
From<input type="date" class="form-control" name="fdate">
To<input type="date" class="form-control" name="tdate"><br />
<button type="submit" name="ftdate" class="form-control alert-success" value="ftdate">Generate Report</button>
</form>
</div>
</td>
<td style="padding-left:5%;">
<div style="padding-left:10%; width:200px; height:200px;">
<b><h3>Paid by</h3></b>
<form action="ex_report.php" method="post">
Member Name<select required name ="person" class="form-control">
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value='<?php echo $row['person'];?>'> <?php echo $row['person'] ;?></option>
<?php 
}
?>
</select><br />
<button type="submit" name="paid_by_butt" class="form-control alert-success" value="paid_by">Generate Report</button>
</form>
</div>
</td>
<td>
<div style="padding-left:30%; width:300px; height:200px;">
<b><h3>Payment Method</h3></b>
<form action="ex_report.php" method="post">
Payment Method<select name="pay_method" required class="form-control">
<option value="Cash">Cash</option>
<option value="Debit Carc">Debit Card</option>
<option value="Credit Card">Credit Card</option>
<option value="E-Wallet">E-Wallet</option>
</select></br>
<button type="submit" name="pay_method_butt" class="form-control alert-success" value="pay_method">Generate Report</button>
</form>
</div>
</td>
<td>
<div style="padding-left:30%; width:300px; height:200px;">
<b><h3>Category</h3></b>
<form action="ex_report.php" method="post">
Category<select required name="cate" class="form-control">
<option value="Unspecified">Unspecified</option>
<option value="Vegetables">Vegetables</option>
<option value="Groceries">Groceries</option>
<option value="Shopping">Shopping</option>
<option value="Travel">Travel</option>
<option value="Educational">Educational</option>
<option value="Medical Products">Medical Products</option>
<option value="Entertainment/Hotel">Entertainment/Hotel</option>
</select></br>
<button type="submit" name="cate_butt" class="form-control alert-success" value="cate">Generate Report</button>
</form>
</td>
</tr>
<tr>
<td colspan="4" style="padding-top:3%;">
<form action="ex_report.php" method="post">
<button type="submit" name="all" class="form-control alert-danger" value="all">Generate All Expense Records Recorded Upto Date</button>
</form>
</td>
</tr>
</table>
</center><!-- InstanceEndEditable -->
<footer style="text-align:center">
<p style="padding-bottom:10px;">Developed By: Rahulkumar Singh</p>
</footer>
</div>

</body>
<!-- InstanceEnd --></html>
