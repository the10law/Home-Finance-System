<?php
session_start();
require ('dbconnect.php');
$con=$_SESSION['con'];
$date=$_POST['date'];
$cate=$_POST['cate'];
$spe_ite=$_POST['spe_ite'];
$amount=$_POST['amount'];
$paid_by=$_POST['paid_by'];
$pay_method=$_POST['pay_method'];
$qry1="insert into expense values('$date','$cate','$spe_ite','$amount','$paid_by','$pay_method')";
$result1=mysqli_query($con,$qry1);
if($result1>0)
$_SESSION['expense_message']="Expense record was stored successfully!!";
else 
$_SESSION['expense_message']="Expense record wasn't stored successfully!!";
header('location:expense_design.php');
?>