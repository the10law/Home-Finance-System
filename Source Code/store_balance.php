<?php
session_start();
require ('dbconnect.php');
$con=$_SESSION['con'];
$name=$_POST['name'];
$amt=$_POST['amt'];

$qry1="insert into balance values('$name','$amt')";
$result1=mysqli_query($con,$qry1);
if($result1>0)
$_SESSION['balance_message']="New Member added successfully!!";
else 
$_SESSION['balance_message']="New Member was not added!!";
header('location:balance_design.php');
?>