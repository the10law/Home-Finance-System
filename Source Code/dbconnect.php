<?php
$dbname="home_finance";
$host="localhost";
$user="root";
$pwd="";
$con=mysqli_connect($host,$user,$pwd,$dbname);
$_SESSION['con']=$con;
?>