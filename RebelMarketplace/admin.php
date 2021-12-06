<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <link rel= "stylesheet" href= "style.css">
    </head>

    <body>
        <div id="menu-outer">
            <div class ="table">
                <img src= "home1.png">
            <ul id="horizontal-list">
                <!--list of links-->
               <li><a class="active" href="login.php">Login</a></li>
              <!--  <li><a href="listings.php">Buy Something </a></li>
                <li><a href="posting.php">Sell Something</a></li>
                <li><a href="profilePage.php">Profile and orders</a></li>
                <li><a href="purchaseForm.php">Purchasing Form</a></li>
                <li><a href="signUp.php">Sign Up Form</a></li>
                <li><a href="admin.php">Admin Page</a></li>
                <li><a href="contact.html">Contact Us</a></li>-->
            </ul>
        </div>
    </div>
        <br><br>

        <header>
            <h1>Administrator Page</h1>
            <label>These are the current items that need approval to be listed.</label>
            <br></br>
            <label>Click the accept button if it is ready to be posted or deny button if this is not an appropriate listing.</label>
        </header>

       
<?php
session_start();
require_once('../../connect.php');

if(isset($_GET['itemNumber'])){
	$query = "";
	if(isset($_GET['approved']))
		$query = "UPDATE item SET itemApproval = 1 WHERE itemNumber = ".$_GET['itemNumber'];
	else
		$query = "DELETE FROM item WHERE itemNumber = " .$_GET['itemNumber'];	
	
	$qr = $conn->query($query);
	echo $query; 
}		

?>
        <br><br>
 
<table align="center" border="0px"> 
<h2>Items Awaiting Approval </h2>
<?php
$query = "SELECT * FROM item WHERE itemApproval = 0";
	$qr = $conn->query($query);
	$rc = $qr->rowCount(); 
	if($rc >0){
	$counter=0;
while($counter< $rc){	
	
echo "<tr>";
#for ($i = 0; $i < $rc; $i++) {
for ($i = 0; $i < 5; $i++) {
	if($counter + $i < $rc){
  $queryObject = $qr->fetch();
  $dbitemName = $queryObject['itemName'];
  $dbcost=$queryObject['cost'];
  $dbcondit=$queryObject['condit'];
  $dbdescription=$queryObject['description'];
?>
<td><?php  echo "item name: <br>" .$dbitemName . "<br>";  
  echo "<img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px ><br>";
  #echo "<br>";
  #echo "$";
  echo"$". $dbcost . "<br>";
  echo "condition: ";
  echo $dbcondit . "<br>";
  echo "description: <br>";
  echo $dbdescription."<br>";
  echo "<form action='admin.php' method=\"GET\">
	<input type='hidden' name='itemNumber' id='itemNumber' value='$queryObject[itemNumber]'>  
	<input type='submit' value='Approve this item' id='1' name='approved' />
	<input type='submit' value='Deny this item' id='0' name='denied' />
	</form>";
echo "</td>";	
}#if
} #for



echo "</tr>";
$counter+=5;
} #while 
} #if
  echo"<br>";
 


$queryObject = $qr->fetch();	


?>
</table>

<table align="center" border="0px">
<h2>Approved items </h2>
<?php

$query = "SELECT * FROM item WHERE itemApproval = 1";
$qr = $conn->query($query);
$rc = $qr->rowCount(); 
	if($rc >0){
	$counter=0;

	while($counter< $rc){	
		
	echo "<tr>";
	#for ($i = 0; $i < $rc; $i++) {
	for ($i = 0; $i < 5; $i++) {
		if($counter + $i < $rc){
	  $queryObject = $qr->fetch();
	  $dbitemName = $queryObject['itemName'];
	  $dbcost=$queryObject['cost'];
          $dbcondit=$queryObject['condit'];
	  $dbdescription=$queryObject['description'];
?>
	<td><?php  echo "item name: <br>" .$dbitemName . "<br>";  
	  echo "<img src='uploads/".$queryObject[itemNumber]."' width=100px height=100px ><br>";
	  #echo "<br>";
	  #echo "$";
	  echo"$". $dbcost . "<br>";
	  echo "condition: ";
	  echo $dbcondit . "<br>";
	  echo "description: <br>";
	  echo $dbdescription."<br>";
	  echo "<form action='admin.php' method=\"GET\">
		<input type='hidden' name='itemNumber' id='itemNumber' value='$queryObject[itemNumber]'>
		<input type='submit' value='Remove this item' id='0' name='denied' />
		</form>";
	  echo "<br>";
	echo "</td>";	
	}#if
	} #for
	
	

	echo "</tr>";
	$counter+=5;
	} #while 
	} #if
	  echo"<br>";
	 
      	

$queryObject = $qr->fetch();	

?>

</table>
      <!--  <footer>
            <p> Rebel Marketplace &#169; 2021</p>
          </footer>-->  
    </body>
</html>
