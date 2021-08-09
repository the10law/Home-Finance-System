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
$result = mysqli_query($con,$qry1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/footer_extend.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Home Finance | Expense</title>
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
footer{background-color:#6DCCEB;height:35px; font-family:Arial, Helvetica, sans-serif; font-size:18px; width:100%;border-bottom-color:#62ADDB; border-radius:5px;}</style>
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
<!-- InstanceBeginEditable name="EditRegion3" -->
<?php
$d1=date('d-m-Y');
$arr=explode("-",$d1);
$d_start=date_create($arr[2].'-'.$arr[1].'-01');
$d_end=date_create($arr[2].'-'.$arr[1].'-31');
$d_start=date_format($d_start,'Y-m-d');
$d_end=date_format($d_end,'Y-m-d');
$qry2="select sum(amount) from expense where date>='$d_start' and date<='$d_end'";
$result2=mysqli_query($con,$qry2);
$rows2=mysqli_fetch_array($result2);
?>
<div class="container">
<section>
<article style="float:left;">
<p>
<h4>Total Expense Recorded this Month:<b style="font-size:25px;"> Rs. <?php echo $rows2[0]; ?></b></h4>
</p>
</article>
<?php
$qry3="select sum(amount) from expense";
$result3=mysqli_query($con,$qry3);
$rows3=mysqli_fetch_array($result3);
?>
<article style="float:right;">
<p>
<h4>Total Expense Recorded Up-To-Date:<b style="font-size:25px;"> Rs. <?php echo $rows3[0]; ?></b></h4>
</p>
</article>
</section>
</div>


<?php
if(isset($_SESSION['expense_message']))
{
echo "<center><b class=alert-info><h4>".$_SESSION['expense_message']."</h4></b></center>";
}
?>

<div class="container" style="height:300px; width:500px;">
<form action="store_expense.php" method="post">
Date<input type="date" placeholder="select date" required name="date" class="form-control"/>
<br />
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
Specific Item/Reason<input type="text" required name="spe_ite"  placeholder="reason/product name" class="form-control"></br>
Amount Spent<input type="text" required name="amount" class="form-control" placeholder="total amount spent"></br>
Paid By<select required name ="paid_by" class="form-control">
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value='<?php echo $row['person'];?>'> <?php echo $row['person'] ;?></option>
<?php 
}
?>
</select></br>
Payment Method<select name="pay_method" required class="form-control">
<option>Cash</option>
<option>Debit Card</option>
<option>Credit Card</option>
<option>E-Wallet</option>
</select></br>
<button class="alert-danger form-control" type="reset">Reset</button>
<br />
<button class="alert-info  form-control col-lg-10 " type="submit" name="login">Store Expense</button>

</form>
</div>
<div style="padding-top:18%;">
</div>
<!-- InstanceEndEditable -->
<div>
<footer style="text-align:center;">
<p style="padding-bottom:10px;">Developed By: Rahulkumar Singh</p>
</footer>
</div>


</body>
<!-- InstanceEnd --></html>
