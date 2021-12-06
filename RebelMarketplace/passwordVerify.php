<?php
 require_once('../../connect.php');
session_start();
#header("Location: listings.php");
$_SESSION['email'] = $_POST['email'];
$_SESSION['firstName'] = $_POST['firstName'];
$_SESSION['lastName'] = $_POST['lastName'];
$_SESSION['phoneNumber'] = $_POST['phoneNumber'];
$_SESSION['password'] = $_POST['password'];
echo "Welcome ".$_SESSION['firstName'];

if($_POST['password'] == $_POST['verify']){
#echo"in if";

	


	header("Location: welcome.php");
}
else{
	echo "in else";
#	echo"passwords dont match as much";
	$_SESSION['passwordsMatch'] = false;
	header("Location: signUpError.php");
}
	
?>

