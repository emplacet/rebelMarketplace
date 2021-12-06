<!DOCTYPE html>
<html>
    <head>
        <title>Profile Page</title>
        <link rel= "stylesheet" href= "style.css">
    </head>

    <body>
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
        <br><br>

        <header>
            <h1>Profile Page</h1>
        </header>

	<h2>Account information: </h2>
<?php
require_once('../../connect.php');
session_start();

if(isset($_GET['itemNumber'])){
	$query="";
	if(isset($_GET['accepted']))
		$query = "UPDATE sale SET sellerApproval = 1 where itemNumber = ".$_GET['itemNumber'];
	if(isset($_GET['status'])){
		$query = "UPDATE sale SET status = 1 where itemNumber = ".$_GET['itemNumber'];
	}	
	$qr=$conn->query($query);
}

$query = "SELECT * from users where email = '".$_SESSION['email']."'";
$qr = $conn->query($query);
#echo $query;
#var_dump($_SESSION);
#echo "<br>";
echo "Welcome " . $_SESSION['email'];
	$rc = $qr->rowCount();
#echo $rc;
for ($i = 0; $i < $rc; $i++) {
          $queryObject = $qr->fetch();
	  $dbEmail = $queryObject['email'];
	  $dbFirstName=$queryObject['firstName'];
          $dbLastName=$queryObject['lastName'];
	  $dbPhoneNumber=$queryObject['phoneNumber'];
	  echo "<br><br> email: ";
	  echo $dbEmail . "<br>";
	  echo "first name: ";
	  echo $_SESSION['firstName'];
	  echo $dbFirstName . "<br>";
	  echo "last name: ";
	  echo $dbLastName . "<br>";
	  echo "phone number: ";
	  echo $dbPhoneNumber."<br>";
	  echo"<br>";

      }

$queryObject = $qr->fetch();


?><br>
        <label>Does something about your information look wrong? Go to our contact us page for ways to reach out to us so we can fix that for you.</label>
        <h2>Your current listings awaiting approval:</h2>
	<?php 
$query= "SELECT * from item where sellerEmail = '".$_SESSION['email']."' AND itemApproval = 0";
$qr=$conn->query($query);
$rc = $qr->rowCount();
echo "You currently have ". $rc. " listings.";
for($i=0; $i<$rc; $i++){
$queryObject = $qr->fetch();

$dbItemName = $queryObject['itemName'];
$dbCost = $queryObject['cost'];
$dbDescription = $queryObject['description'];
$dbCondition = $queryObject['condit'];


echo "<br><br> Item Name: " .$dbItemName;
echo "<br><img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px>";
echo "<br> Description: " .$dbDescription;
echo"<br> Price: " .$dbCost;
echo "<br> Condition: " .$dbCondition;
}
$queryObject = $qr->fetch();
?>

<h2>Your Current listings that have been approved:</h2>

	<?php 
$query= "SELECT * from item where sellerEmail = '".$_SESSION['email']."' AND itemApproval = 1";
$qr=$conn->query($query);
$rc = $qr->rowCount();
echo "You currently have ". $rc. " listings.";
for($i=0; $i<$rc; $i++){
$queryObject = $qr->fetch();

$dbItemName = $queryObject['itemName'];
$dbCost = $queryObject['cost'];
$dbDescription = $queryObject['description'];
$dbCondition = $queryObject['condit'];


echo "<br><br> Item Name: " .$dbItemName;
echo "<br><img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px>";
echo "<br> Description: " .$dbDescription;
echo"<br> Price: " .$dbCost;
echo "<br> Condition: " .$dbCondition;
}
$queryObject = $qr->fetch();
?>
<h2>Items you have filled out the purchase form for:</h2>
		<?php
	
		?>
		<?php
$query = "SELECT * from sale where buyerEmail = '".$_SESSION['email']."' AND sellerApproval != 1";
			$qr= $conn->query($query);
			$rc = $qr->rowCount();
			echo "You have attempted to purchase " .$rc ." order(s).";
			echo "<br>";
			for($i=0; $i<$rc; $i++){
			$queryObject=$qr->fetch();
			$dbItemNumber= $queryObject['itemNumber'];
			$dbLocation = $queryObject['location'];
			$dbMonth = $queryObject['month'];
			$dbDay = $queryObject['day'];
			$dbYear = $queryObject['year'];
			$dbHour =$queryObject['hour'];
			$dbMinute = $queryObject['minute'];
			$dbAMorPM = $queryObject['amOrpm'];
			echo "<br> location: " .$dbLocation;
			echo "<br> the date: " .$dbMonth;
			echo " " .$dbDay;
			echo" " .$dbYear;
			echo "<br> time: " .$dbHour;
			echo ":" .$dbMinute;
			echo " " .$dbAMorPM;
			$query = "SELECT * from item where itemNumber = '".$dbItemNumber."'";
			$qr= $conn->query($query);
			$queryObject= $qr->fetch();
			$dbItemName = $queryObject['itemName'];
			$dbDescription = $queryObject['description'];
			$dbCondition = $queryObject['condit'];
			$dbSellerEmail = $queryObject['sellerEmail'];
			echo "<br> item name: " . $dbItemName;
			echo"<br> <img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px>";
			echo"<br> item description: " .$dbDescription;
			echo"<br> item condition: " .$dbCondition;
			echo"<br> seller email: " .$dbSellerEmail;
			echo "<br>";
			}
			$queryObject = $qr->fetch();

		?>
<h2>Your Items That Someone Wants to Buy:</h2>
<?php
			$query = "SELECT * FROM sale where sellerEmail = '".$_SESSION['email']."' AND sellerApproval != 1";
			$qr = $conn-> query($query);
			$rc = $qr->rowCount();
			echo "You have " .$rc ." item(s) someone wants to buy.";
			echo"<br>";
			for($i=0; $i<$rc; $i++){
			$queryObject=$qr->fetch();
			$dbItemNumber= $queryObject['itemNumber'];
			$dbLocation = $queryObject['location'];
			$dbMonth = $queryObject['month'];
			$dbDay = $queryObject['day'];
			$dbYear = $queryObject['year'];
			$dbHour =$queryObject['hour'];
			$dbMinute = $queryObject['minute'];
			$dbAMorPM = $queryObject['amOrpm'];
			$dbBuyerEmail = $queryObject['buyerEmail'];
			echo "<br> location: " .$dbLocation;
			echo "<br> the date: " .$dbMonth;
			echo " " .$dbDay;
			echo" " .$dbYear;
			echo "<br> time: " .$dbHour;
			echo ":" .$dbMinute;
			echo " " .$dbAMorPM;
			echo "<br> Buyer email: " .$dbBuyerEmail;
			$query = "SELECT * from item where itemNumber = '".$dbItemNumber."'";
			$qr= $conn->query($query);
			$queryObject= $qr->fetch();
			$dbItemName = $queryObject['itemName'];
			$dbDescription = $queryObject['description'];
			$dbCondition = $queryObject['condit'];
			$dbSellerEmail = $queryObject['sellerEmail'];
			echo "<br> item name: " . $dbItemName;
			echo"<br> <img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px>";
			echo"<br> item description: " .$dbDescription;
			echo"<br> item condition: " .$dbCondition;
		#	echo"<br> seller email: " .$dbSellerEmail;
			echo "<br>";
			echo "<form action='profilePage.php' method=\"GET\">
				<input type='hidden' name='itemNumber' id='itemNumber' value='$queryObject[itemNumber]'>
				<input type='submit' value='Accept this offer' id='1' name='accepted'/>
				</form>";
			}
			$queryObject = $qr->fetch();
?>
<h2> Pending Sales: </h2>
<?php
			$query = "SELECT * FROM sale where sellerEmail = '".$_SESSION['email']."' AND sellerApproval = 1 AND status !=1";
			$qr = $conn-> query($query);
			$rc = $qr->rowCount();
			echo "You have " .$rc ." pending sale(s).";
			echo"<br>";
			for($i=0; $i<$rc; $i++){
			$queryObject=$qr->fetch();
			$dbItemNumber= $queryObject['itemNumber'];
			$dbLocation = $queryObject['location'];
			$dbMonth = $queryObject['month'];
			$dbDay = $queryObject['day'];
			$dbYear = $queryObject['year'];
			$dbHour =$queryObject['hour'];
			$dbMinute = $queryObject['minute'];
			$dbAMorPM = $queryObject['amOrpm'];
			$dbBuyerEmail = $queryObject['buyerEmail'];
			echo "<br> location: " .$dbLocation;
			echo "<br> the date: " .$dbMonth;
			echo " " .$dbDay;
			echo" " .$dbYear;
			echo "<br> time: " .$dbHour;
			echo ":" .$dbMinute;
			echo " " .$dbAMorPM;
			echo "<br> Buyer email: " .$dbBuyerEmail;
			$query = "SELECT * from item where itemNumber = '".$dbItemNumber."'";
			$qr= $conn->query($query);
			$queryObject= $qr->fetch();
			$dbItemName = $queryObject['itemName'];
			$dbDescription = $queryObject['description'];
			$dbCondition = $queryObject['condit'];
			$dbSellerEmail = $queryObject['sellerEmail'];
			echo "<br> item name: " . $dbItemName;
			echo"<br> <img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px>";
			echo"<br> item description: " .$dbDescription;
			echo"<br> item condition: " .$dbCondition;
		#	echo"<br> seller email: " .$dbSellerEmail;
			echo "<br>";
			echo "<form action='profilePage.php' method=\"GET\">
				<input type='hidden' name='itemNumber' id='itemNumber' value='$queryObject[itemNumber]'>
				<input type='submit' value='Item has been Sold' id='1' name='status'/>
				</form>";
			}
			$queryObject = $qr->fetch();
?>

<h2> Items You have sold: </h2>
<?php
			$query = "SELECT * FROM sale where sellerEmail = '".$_SESSION['email']."' AND status = 1";
			$qr = $conn-> query($query);
			$rc = $qr->rowCount();
			echo "You have sold " .$rc ." item(s).";
			echo"<br>";
			for($i=0; $i<$rc; $i++){
			$queryObject=$qr->fetch();
			$dbItemNumber= $queryObject['itemNumber'];
			$dbLocation = $queryObject['location'];
			$dbMonth = $queryObject['month'];
			$dbDay = $queryObject['day'];
			$dbYear = $queryObject['year'];
			$dbHour =$queryObject['hour'];
			$dbMinute = $queryObject['minute'];
			$dbAMorPM = $queryObject['amOrpm'];
			$dbBuyerEmail = $queryObject['buyerEmail'];
			echo "<br> location: " .$dbLocation;
			echo "<br> the date: " .$dbMonth;
			echo " " .$dbDay;
			echo" " .$dbYear;
			echo "<br> time: " .$dbHour;
			echo ":" .$dbMinute;
			echo " " .$dbAMorPM;
			echo "<br> Buyer email: " .$dbBuyerEmail;
			$query = "SELECT * from item where itemNumber = '".$dbItemNumber."'";
			$qr= $conn->query($query);
			$queryObject= $qr->fetch();
			$dbItemName = $queryObject['itemName'];
			$dbDescription = $queryObject['description'];
			$dbCondition = $queryObject['condit'];
			$dbSellerEmail = $queryObject['sellerEmail'];
			echo "<br> item name: " . $dbItemName;
			echo"<br> <img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px>";
			echo"<br> item description: " .$dbDescription;
			echo"<br> item condition: " .$dbCondition;
		#	echo"<br> seller email: " .$dbSellerEmail;
			echo "<br>";
			
			}
			$queryObject = $qr->fetch();
?>

<h2> Items You have bought: </h2>
       <?php
			$query = "SELECT * FROM sale where buyerEmail = '".$_SESSION['email']."' AND status = 1";
			$qr = $conn-> query($query);
			$rc = $qr->rowCount();
			echo "You have bought " .$rc ." item(s).";
			echo"<br>";
			for($i=0; $i<$rc; $i++){
			$queryObject=$qr->fetch();
			$dbItemNumber= $queryObject['itemNumber'];
			$dbLocation = $queryObject['location'];
			$dbMonth = $queryObject['month'];
			$dbDay = $queryObject['day'];
			$dbYear = $queryObject['year'];
			$dbHour =$queryObject['hour'];
			$dbMinute = $queryObject['minute'];
			$dbAMorPM = $queryObject['amOrpm'];
			$dbBuyerEmail = $queryObject['sellerEmail'];
			echo "<br> location: " .$dbLocation;
			echo "<br> the date: " .$dbMonth;
			echo " " .$dbDay;
			echo" " .$dbYear;
			echo "<br> time: " .$dbHour;
			echo ":" .$dbMinute;
			echo " " .$dbAMorPM;
			echo "<br> Seller email: " .$dbBuyerEmail;
			$query = "SELECT * from item where itemNumber = '".$dbItemNumber."'";
			$qr= $conn->query($query);
			$queryObject= $qr->fetch();
			$dbItemName = $queryObject['itemName'];
			$dbDescription = $queryObject['description'];
			$dbCondition = $queryObject['condit'];
			$dbSellerEmail = $queryObject['sellerEmail'];
			echo "<br> item name: " . $dbItemName;
			echo"<br> <img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px>";
			echo"<br> item description: " .$dbDescription;
			echo"<br> item condition: " .$dbCondition;
		#	echo"<br> seller email: " .$dbSellerEmail;
			echo "<br>";
			
			}
			$queryObject = $qr->fetch();
?>


       <!-- <footer>
            <p> Rebel Marketplace &#169; 2021</p>
          </footer>-->  
    </body>
</html>

