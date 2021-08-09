<?php
session_start();
require ('dbconnect.php');
$con=$_SESSION['con'];
$date=$_POST['date'];
$person=$_POST['person'];
$amount=$_POST['amount'];

$qry1="insert into withdrawal values('$date','$person','$amount')";
$result1=mysqli_query($con,$qry1);
if($result1>0)
$_SESSION['withdrawal_message']="Withdrawal record was stored successfully!!";
else 
$_SESSION['withdrawal_message']="Withdrawal record wasn't stored successfully!!";
header('location:withdrawal_design.php');
?>