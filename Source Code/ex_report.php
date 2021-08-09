<?php
session_start();
if($_SESSION['logged_in']!=true)
{
header("location: login_design.php");
die;
}
require ('dbconnect.php');
$con=$_SESSION['con'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/footer_less.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
</style>
<?php
if(isset($_POST['ftdate']))
{
$button=$_POST['ftdate'];
$tdate=$_POST['tdate'];
$fdate=$_POST['fdate'];
}
else if(isset($_POST['paid_by_butt']))
{
$button=$_POST['paid_by_butt'];
$paid_by=$_POST['person'];
}
else if(isset($_POST['pay_method_butt']))
{
$button=$_POST['pay_method_butt'];
$pay_method=$_POST['pay_method'];
}
else if(isset($_POST['cate_butt']))
{
$button=$_POST['cate_butt'];
$cate=$_POST['cate'];
}

else if(isset($_POST['all']))
{
$button=$_POST['all'];
}



if($button=="ftdate")
{
$qry="select * from expense where date>='$fdate' and date<='$tdate'";
}
else if($button=="paid_by")
{
$qry="select * from expense where paid_by='$paid_by'";
}
else if($button=="pay_method")
{
$qry="select * from expense where pay_method='$pay_method'";
}
else if($button=="cate")
{
$qry="select * from expense where category='$cate'";
}
else if($button=="all")
{
$qry="select * from expense";
}




$result1=mysqli_query($con,$qry);
if(!$result1)
echo "<h1><b>Expense Record Not Found!!!";
else
{
?>
<div class="container">
<table>
<tr>
<th>Date</th>
<th>Category</th>
<th>Specific Item</th>
<th>Amount Spent</th>
<th>Paid By</th>
<th>Payment Method</th>
</tr>
<?php
while ($row=mysqli_fetch_array($result1))
{
?>
<tr>
<td><?php echo $row['date'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['specific_item'];?></td>
<td><?php echo $row['amount'];?></td>
<td><?php echo $row['paid_by'];?></td>
<td><?php echo $row['pay_method'];?></td>
</tr>
<?php
}
}
?>
</table>
</div>



<!-- InstanceEndEditable -->


</body>
<!-- InstanceEnd --></html>
