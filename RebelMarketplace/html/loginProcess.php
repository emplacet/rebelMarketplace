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
             <li><a class="active" href="login.php">Home</a></li>
           <li><a href="listings.php">Buy Something </a></li>
            <li><a href="posting.php">Sell Something</a></li>
            <li><a href="profilePage.php">Profile and orders</a></li>
            <li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.php">Admin Page</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>
</div>
<?php
require_once('../../connect.php');
#echo "<br>".$queryObject['firstName'];
?>

<h1>Logged in Successfully</h1>

<?php

session_start();
$_SESSION['email'] = $_POST['email'];
echo "Welcome ".$_SESSION['email'];
	$password = $_POST['password'];

    //create query to see if email exists in users table of database
    $query = "SELECT * from users where email = '".$email."'";
    $qr = $conn->query($query);

    $rc = $qr->rowCount();

  #  if ($rc >0) {
   #     $queryObject = $qr->fetch();

        //check to see if the password from the form equals the encrypted password in the database
    #    $dbPass = $queryObject['password'];
     #   if (password_verify($password,$dbPass)) {
      #      echo "Successful Login";
       #     $_SESSION["userEmail"] = $email;
        #    $dbName = $queryObject['name'];
         #   $_SESSION["name"] = $dbName;


 #           if ($email == "erplacet@go.olemiss.edu") {
#                header("Location: admin.php");
  /*          }
        }
        //if it doesn't, unsuccessful login
        else {
            echo "Incorrect Password";
        }
    }
    else {
        //if email does not exist in database, unsuccessful login
        echo "There is not an account assiociated with this email";
    }
#$query = "INSERT INTO users(email, firstName, lastName, phoneNumber)  VALUES('".$_GET["email"]."','".$_GET["firstName"]."','".$_GET["lastName"]."','".$_GET["phoneNumber"]."')";
$qr = $conn->query($query);
$qr->execute();

		#	$rc = $qr->rowCount();
		#	
#mysqli_query($conn,$query);


   */
#$queryObject = $qr->fetch();
?>
<footer>
    <p> Rebel Marketplace &#169; 2021</p>
  </footer>


    </body>

</html>

