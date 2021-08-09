<?php
session_start();
require ('dbconnect.php');
$con=$_SESSION['con'];
$date=$_POST['date'];
$person=$_POST['person'];
$month=$_POST['month'];
$amount=$_POST['amount'];

$qry1="insert into income values('$date','$person','$month','$amount')";
$result1=mysqli_query($con,$qry1);
if($result1>0)
$_SESSION['income_message']="Income record was stored successfully!!";
else 
$_SESSION['income_message']="Income record wasn't stored successfully!!";
header('location:income_design.php');
?>