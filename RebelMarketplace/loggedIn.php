<?php
 require_once('../../connect.php');
session_start();
#header("Location: listings.php");
$_SESSION['email'] = $_POST['email'];
#$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '". $_SESSION['email']. "' AND password = '". md5($_POST['password']) ."'";  
echo $query;
$qr = $conn->query($query);
$rc = $qr->rowCount();

echo "number of results: ". $rc;
#echo "first name: ". $qr['firstName'];
#echo "email: ". $qr['email'];
#echo "password: ".$qr['password'];

echo "before if";
if($qr->rowCount() == 0){
	echo "if blcok ";
	header("Location: loginError.php");
#change login to loginError to display error message 
}

#echo "Welcome ".$qr['firstName'];

if($_SESSION['email'] == 'admin@gmail.com' AND $_POST['password'] == 'passwordAdmin')
	header("Location: admin.php");
elseif($qr->rowCount()==1)
	header("Location: listings.php");

	
?>
