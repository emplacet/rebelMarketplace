<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href= "style.css">
        <title>Rebel Marketplace</title> 
    </head>

    <body>
        <div id="menu-outer">
        <div class ="table">
            <img src= "home1.png">
        <ul id="horizontal-list">
            <!--list of links-->
       <li><a class="active" href="login.php">Login</a></li>
          <!-- <li><a href="listings.php">Buy Something </a></li>
            <li><a href="posting.php">Sell Something</a></li>
            <li><a href="profilePage.html">Profile and orders</a></li>
           <li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.html">Admin Page</a></li>-->
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>
</div>
        <br><br>
<?php
require_once('../../connect.php');
session_start();
#$_SERVER["HTTP_REFFER"]= "login.php";
?>
        <header>
            <h1>Rebel Marketplace</h1>
        </header>

        <div class = "login">
        <label>Sign in below if you already have an account</label>
        <br></br>
        <form action="loggedIn.php" method="post">
            <label><b>Email</b></label> 
            <input type = "email" name="email" id="email" placeholder = "email">
            <br><br>
            <label><b>Password</b></label>
            <input type = "password" name = "password" id = "password" placeholder = "Password">
	    <br><br>
	     <input type= "submit" value="Login">
           <!-- <button onclick = "login()" name = "logButton" id = "logButton">Submit</button>
-->	   
 <br><br>
        </form>
        </div>

        <!--sign up buttons-->
        <div class = "signUp">
        <form action="signUp.php" method="get">
            <label><b>Sign up here if you do not have an account already:</b>
            <input type = "submit" value = "Sign up">
            <br><br>
        </form>

        <!--javascript to redirect the page
        <script>
            function signUpPage() {
                location.replace("signUp.html")
            }
        </script>-->
        </div>

        <footer>
            <p> Rebel Marketplace &#169; 2021</p>
          </footer>
    </body>
</html>


