<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href= "style.css">
</head>
<title> Sign Up Page</title>

<body>

    <!--for the Nav bar -->
    <div id="menu-outer">
        <div class ="table">
            <img src= "home1.png">
        <ul id="horizontal-list">
            <!--list of links-->
             <li><a class="active" href="login.php">Log Out</a></li>
           <li><a href="listings.php">Buy Something </a></li>
            <li><a href="posting.php">Sell Something</a></li>
            <li><a href="profilePage.php">Profile and orders</a></li>
            <!--<li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.php">Admin Page</a></li>-->
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
</div>
<?php
session_start();
require_once('../../connect.php');
#echo "<br>".$queryObject['firstName'];
?>

<h1>Account Created Successfully</h1>

<?php
$query = "INSERT INTO users(email, firstName, lastName, phoneNumber, password)  VALUES('".$_SESSION["email"]."','".$_SESSION["firstName"]."','".$_SESSION["lastName"]."','".$_SESSION["phoneNumber"]."','".md5($_SESSION["password"])."')";
#echo $query;
$qr = $conn->query($query);
$qr->execute();


		#	$rc = $qr->rowCount();
		#	
#mysqli_query($conn,$query);



#$queryObject = $qr->fetch();
?>
<footer>
    <p> Rebel Marketplace &#169; 2021</p>
  </footer>


    </body>

</html>

