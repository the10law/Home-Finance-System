<?php

session_start();
require('dbconnect.php');
$con=$_SESSION['con'];
$uname = $_POST['uname'];
$qry="SELECT * FROM login WHERE username='$uname'";
$result = mysqli_query($con,$qry);
$_SESSION['logged_in'] = false;
if ( $result->num_rows == 0 ){ // User doesn't exist

    $_SESSION['message_fail'] = "User with that username doesn't exist!";
    header("location: login_design.php");
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( $_POST['pass']==$user['password'])  {
        $_SESSION['message_success']= "You have been logged in successfully!";
         $_SESSION['logged_in'] = true;
        header("location: home.php");
    }
    else {
	 
        $_SESSION['message_fail'] = "You have entered wrong password, try again!";
        header("location: login_design.php");
    }
}

?>