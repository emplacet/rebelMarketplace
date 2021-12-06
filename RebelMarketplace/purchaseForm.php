<!DOCTYPE html>
<html>

<head>
    <link rel= "stylesheet" href= "style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<title> Rebel Marketplace</title>

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
session_start();
require_once('../../connect.php');
echo "Welcome ".$_SESSION['email'];
?>
    

        <form action="bought.php" method="get">
            <h1> <strong> Congratulations! You made a purchase! </strong> </h1>
            <label>Fill out this information and your seller will be in contact soon!</label>
	    <br></br>
<?php

	echo "<input type='hidden' name='itemNumber' id='itemNumber' value='".$_GET[itemNumber]."'>"
#	echo "<input type='hidden' name='sellerEmail' id='sellerEmail' value='".$_GET[sellerEmail]."'>"
#	echo $_GET[sellerEmail];
?>
<?php
	$query = "SELECT * from item where itemNumber = '".$_GET['itemNumber']."'";
#	echo $query;
	$qr = $conn->query($query);
	$queryObject = $qr->fetch();
	$dbItemName = $queryObject['itemName'];
	$dbDescription = $queryObject['description'];
	$dbCost = $queryObject['cost'];
	$dbCondition = $queryObject['condit'];
	$sellerEmail = $queryObject['sellerEmail'];
#	echo "seller email: ".$sellerEmail;
	echo "The item you want to buy is: ";
	echo "<br> item name: ". $dbItemName;
	echo "<br> <img src='uploads/".$_GET['itemNumber']."' width=100px height=100px>";
	echo "<br> item description: ".$dbDescription;
	echo "<br>item condition: ".$dbCondition;
	echo "<br>cost: $".$dbCost;
	$queryObject = $qr->fetch();
?>
            <br></br>
            <label for="location"> <b> What address would you like to purchase your item at?</b> <br></br></label>
            <input type="text" placeholder="enter your current Location" name="location" id="location" size="50"
                required>
	    <br></br>
	<label><b>What date would you like to pick your item up?</b></label><br>
            <label for="month"> <b> Month:</b></label>
	    <select id="month" name="month">
		<option value="january">January</option>
		<option value="february">February</option>
		<option value="march">March</option>
		<option value="april">April</option>
		<option value="may">May</option>
		<option value="june">June</option>
		<option value="july">July</option>
		<option value="august">August</option>
		<option value="september">September</option>
		<option value="october">October</option>
		<option value="november">November</option>
		<option value="december">December</option>	
</select>
<br>
		<label for="day"> <b>Day:</b></label>
		<select id="day" name="day"><br>	
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
		</select>
		<br>

		<label for="year"><b>Year:</b></label>
		<select id="year" name="year"><br>
		<option value="2021">2021</option>
		<option value="2022">2022</option>
		</select>
		<br><br>
	<label><b>What time would you like to pick your item up?</b></label><br>
	<!--	<label for="year"><b>Year</b><br></label>
		<input type="year" id="year" name="year">
	-->	<label for="hour"></label>
		<select id="hour" name="hour">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		</select>
		<label for="minute"> <b>:</b></label>
		<select id="minute" name="minute">
		<option value="00">00</option>	
		<option value="15">15</option>
		<option value="30">30</option>
		<option value="45">45</option>
		</select>
		</select>
		</select>
		</select>
		<label for="amOrpm"><b>am or pm?</b></label>
	    <select id="amOrpm" name="amOrpm">
		<option value="am">AM</option>
		<option value="pm">PM</option>
	   </select>       

<br><br>
	    <label for="payment"><b>Check this box to verify you agree to pay this sale in cash:</b></label>
	<input type="checkbox" name="checkbox_name" value="checkbox_value">
           <!-- <input type="payment" placeholder="venmo or cash" id="payment" name="payment">-->
	    <br></br>
	 
	  <input type="hidden" value="<?php echo $_GET['itemNumber'];?>"  id="itemNumber" name="itemNumber">
<!--	<label for="buyerEmail"><b>Enter your email</b><br>
	<input type="text" placeholder="enter your email" id="buyerEmail" name="buyerEmail"> -->
	<input type="hidden" value="<?php echo $sellerEmail;?>" id="sellerEmail" name="sellerEmail">
<input type="submit" value="buy this item">	   

<!-- <button onclick="ScheduleFunction()">Submit</button>

        </form>
        <script>
            function ScheduleFunction() {
                location.replace("RiderSchedule.html")
            }


	</script>-->

<?php
$query = "select * from sale";
	$qr = $conn->query($query);
	$rc = $qr->rowCount();
	#echo $rc;
$queryObject = $qr->fetch();

?>

<footer>
    <p> Rebel Marketplace &#169; 2021</p>
  </footer>


    </body>

</html>

