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
           <!-- <li><a href="purchaseForm.php">Purchasing Form</a></li>
            <li><a href="signUp.php">Sign Up Form</a></li>
            <li><a href="admin.php">Admin Page</a></li>-->
            <li><a href="contact.php">Contact Us</a></li>        </ul>
    </div>
</div>
<?php
session_start();
require_once('../../connect.php');
#echo $_SESSION["email"];
echo "Welcome ".$_SESSION['email'];
#echo "<br>".$queryObject['firstName'];
#echo "the other name is: ". $_POST["otherName"];

?>

<h1>Congrats! Your item is now under review and when it is approved it will be posted on the buy something page!</h1>

<?php
if($_POST["otherName"] != ""){
$query ="INSERT INTO item(itemName, cost, itemApproval, description, condit, sellerEmail) VALUES('".$_POST["otherName"]."','".$_POST["cost"]."', 0,'".$_POST["description"]."','".$_POST["condit"]."','".$_SESSION["email"]."')";
$sanitizedQuery=htmlspecialchars($query, ENT_QUOTES);#sanitized query
echo $sanitizedQuery." sanitized ";
echo htmlspecialchars("Christian's diploma", ENT_QUOTES);
$sanitizedQuery=htmlspecialchars($query, ENT_QUOTES);#sanitized query
} else{ 
#echo "the lsit name is: " .$_POST["itemName"];
$query = "INSERT INTO item(itemName, cost, itemApproval, description, condit, sellerEmail) VALUES('".$_POST["itemName"]."','".$_POST["cost"]."', 0,'".$_POST["description"]."','".$_POST["condit"]."','".$_SESSION["email"]."')";
}
#echo " made it first ";
#echo $query;

$uploaddir = '/home/erplacet/public_html/rebelMarketplace/uploads/';
$uploadfile = $uploaddir . $_POST["itemNumber"];
echo '<pre>';

if(isset($_FILES)){
	#echo $uploadfile;
}
else{
	echo "no picture";
}

if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
#print_r($_FILES);
print "</pre>";

$qr = $conn->query($query);
#$qr->execute();

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

