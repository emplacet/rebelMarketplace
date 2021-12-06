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
          <!--  <li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.php">Admin Page</a></li>-->
            <li><a href="contact.php">Contact Us</a></li>        </ul>
    </div>
</div>
<?php
require_once('../../connect.php');
#echo "<br>".$queryObject['firstName']
#;
session_start();
echo "Welcome ".$_SESSION['email'];
?>

<h1>Your information has been sent to the seller Successfully</h1>

<?php
$query = "INSERT INTO sale(location, itemNumber, buyerEmail, sellerApproval, status, month, day, year, hour, minute, amOrpm, sellerEmail)  VALUES('".$_GET["location"]."','".$_GET["itemNumber"]."','".$_SESSION["email"]."','0','0','".$_GET["month"]."','".$_GET["day"]."','".$_GET["year"]."','".$_GET["hour"]."','".$_GET["minute"]."','".$_GET["amOrpm"]."','".$_GET["sellerEmail"]."')";
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

