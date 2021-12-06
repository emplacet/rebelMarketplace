<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href= "style.css">
</head>
<title> Sign Up Page</title>

<body>
<div class="wrapper">
    <!--for the Nav bar -->
    <div id="menu-outer">
        <div class ="table">
            <img src= "home1.png">
        <ul id="horizontal-list">
            <!--list of links-->
            <li><a class="active" href="login.php">Login</a></li>
          <!-- <li><a href="listings.php">Buy Something </a></li>
            <li><a href="posting.php">Sell Something</a></li>
            <li><a href="profilePage.php">Profile and orders</a></li>
            <li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.php">Admin Page</a></li>-->
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>
</div>
<?php
session_start();
require_once('../../connect.php');
#echo "<br>".$queryObject['firstName'];
?>

<div align='center'>    
<font color='red'><h1>Passwords Must Match!</h1></font>
</div>     
	<form action="passwordVerify.php" method="post">
            <h1> <strong> Sign up </strong> </h1>
            <label>Now that you have been verified, fill out this information </label>
            <br></br>
            <label>and click on the create account button to create your own account.</label>
           
            
            <br></br>
            <label for="itemName"> <b> Enter your Ole Miss email:</b> <br></br></label>
            <input type="text" placeholder="janedoe@go.olemiss.edu" name=email id=email size="30"
                required>
	    <br></br>
	    <label for="password"><b> Enter a Password:</b><br></br></label>
	    <input type="password" placeholder="Enter a password" id="password" name="password">
	    <br></br>
	    <label for="password"><b> Re-enter a Password:</b><br></br></label>
	     <input type="password" placeholder="Re-enter password" id="verify" name="verify">
            <br></br>   
	<label for="firstName"> <b> Enter your first name: </b><br></br></label>
            <input type="text" placeholder="Jane" id="firstname" name="firstName">
           <br></br>
            <label for="lastName"><b> Enter your last name: </b><br></br></label>
            <input type="text" placeholder="Doe" id="lastName" name="lastName" size="30">
            <br></br>
            <label for="phoneNumber"><b>Enter your phone number: </b></label>
            <br></br>
            <input type="int" placeholder="6221234567" id="phoneNumber" name="phoneNumber">
	   <!--<br></br>
<label for="payment">What forms of payment will you accept? </label>
	   <br><br>
	   <select name="payment" id="payment" multiple>
		   <option value="venmo">Venmo</option>
		   <option value="cash">Cash</option>
		   <option value="cash app">Cash App</option>
		   <option value="paypal">Paypal</option>

	   </select>-->
<br>

	<input type="submit" value="Create Account">

<!--            <button onclick="ScheduleFunction()">Create Account</button>

        </form>
        <script>
            function ScheduleFunction() {
                location.replace("RiderSchedule.html")
            }

        </script>-->
<?php 
$query = "SELECT * from seller";
			$qr = $conn->query($query);
			$rc = $qr->rowCount();
			


$queryObject = $qr->fetch();
?>
</div>
<footer>
    <p> Rebel Marketplace &#169; 2021</p>
 </footer>


    </body>

</html>

