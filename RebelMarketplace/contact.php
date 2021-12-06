<!DOCTYPE html>
<html>
    <head>
        <title>Contact Page</title>
        <link rel= "stylesheet" href= "style.css">
    </head>
    <?php
	      session_start();
	      require_once('../../connect.php');
	      echo "hello";
	      echo "Welcome ".$_SESSION['email'];
?>
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
           <!-- <li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.php">Admin Page</a></li>-->
            <li><a href="contact.php">Contact Us</a></li>            </ul>
        </div>
    </div>
        <br><br>

        <header>
            <h1>Contact Us</h1>
        </header>

        <label>Wondering how to reach us or need help with something? </label>
        <br></br>
        <br></br>
        <h1>Our Email:</h1>
        <label>rebelmarketplace@gmail.com</label>
        <h1>Our Phone Number:</h1>
        <label>(480)717-2836</label>

       
        <br></br><br></br><br></br>
        <footer>
            <p> Rebel Marketplace &#169; 2021</p>
          </footer>  
    </body>
</html>

