<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href= "style.css">

<script type = "text/javascript">
	function setOther(choice){
		var element = document.getElementById('itemName');
		var textElement = document.getElementById('otherName');	
		if(element.value=='other'){
			textElement.style.visibility='visible';	
		}
		else{
			textElement.style.visibility='hidden';
		}
	}
</script>
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
           <!-- <li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.php">Admin Page</a></li>-->
            <li><a href="contact.html">Contact Us</a></li>        </ul>
    </div>
</div>
<?php 
session_start();
require_once('../../connect.php');
$query= "SELECT MAX(itemNumber) AS idx from item";
$qr = $conn->query($query);
$queryObject = $qr->fetch();
$res = $queryObject["idx"]+1;

echo "Welcome ".$_SESSION['email'];
?>  
        <form action="posted.php" method="post" enctype="multipart/form-data">
            <h1> <strong> Ready to sell something? </strong> </h1>
            <label>Fill out this information and click on the submit button. Your listing will then be approved by our staff as long as it meets requirements.</label>
            <br><br>
	    <br><br>
<!--	<label for="itemNumber"><b>Enter Item Number</b> <br> </label>
	<input type="text" placeholer="temp number until increment" name="itemNumber" id="itemNumber" size="11">
-->
<br>	   
 <label for="itemName"> <b> What item are you wanting to sell?</b> <br></br></label>
	    <select name="itemName" id="itemName" onchange='setOther(this.value);'>
		<option default selected disabled>Select Option</option>
		<option value ="barstool">Barstool</option>
		<option value ="bed frame">Bed Frame</option>
		<option value ="bedside table">Bedside Table</option>
		<option value ="blender">Blender</option>
		<option value ="chair">Chair</option>
		<option value ="couch">Couch</option>
		<option value ="desk">Desk</option>
		<option value ="dresser">Dresser</option>
		<option value ="kitchen table">Kitchen Table</option>
		<option value ="lamp">Lamp</option>
		<option value ="mattress">Mattress</option>
		<option value ="mattress topper">Matress Topper</option>
		<option value ="microwave">Microwave</option>
		<option value ="ottoman">Ottoman</option>
		<option value ="printer">Printer</option>
		<option value ="refrigerator">Refrigerator</option>
		<option value ="rug">Rug</option>
		<option value ="shoe rack">Shoe Rack</option>
		<option value ="television">Television</option>
		<option value ="other">Other</option>
		</select>
	    <br>
		<input type="text" placeholder="enter the item name" name="otherName" id="otherName" style="visibility:hidden">
<br>
            <label for="cost"> <b> Enter the price you want to sell it at </b><br></br></label>
            <label>$</label>
            <input type="integer" placeholder="enter the price" id="cost" name="cost">
           <br><br>
            <label for="description"><b>Tell us a little bit more about the item you want to sell, type a brief description about it here: </b><br></br></label>
            <input type="text" placeholder="enter description" id="description" name="description" size="60">
            <br><br>
            <label for="condit"><b>What is the condition of the item like?</b></label>
            <br><br>
	    <select id="condit" name="condit">
		<option value="new">New</option>
		<option value="good">Good</option>
		<option value="fair">Fair</option>
		<option value="poor">Poor</option>
	   </select>
	   <br><br>
	    <label for="picture"><b>Please attach an image of your item:</b></label>
	   <br><br>
	   <input type="file" id="picture" name="picture">
	  <input type="hidden" name="MAX_FILE_SIZE" value="500000" />

	  <input type="hidden" name="itemNumber" type="itemNumber" value="<?php echo $res;?>"/>
	   <br><br>
	  <label for="payment"><b>Check this box to agree this sale is cash only:</b> </label>
	   
	<input type="checkbox" name="checkbox_name" value="checkbox_value">
	  <!-- <select name="payment" id="payment" multiple>
		   <option value="venmo">Venmo</option>
		   <option value="cash">Cash</option>
		   <option value="cash app">Cash App</option>
		   <option value="paypal">Paypal</option>
		   
	   </select>-->

	   <br><br>
<input type="submit" value="Post Item">

</form>
           <!-- <button onclick="ScheduleFunction()">Submit</button>

        </form>
        <script>
            function ScheduleFunction() {
                location.replace("RiderSchedule.html")
            }

	</script>-->
<?php 
$query = "SELECT * from item";
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

