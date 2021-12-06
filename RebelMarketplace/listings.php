<!DOCTYPE html>
<html>
    <head>
        <title>Current Listings </title>
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
            <!--<li><a href="purchaseForm.php">Purchasing Form (Remove)</a></li>
            <li><a href="signUp.php">Sign Up Form (remove)</a></li>
            <li><a href="admin.php">Admin Page (remove)</a></li>-->
            <li><a href="contact.php">Contact Us</a></li>        </div>
    </div>
<?php
session_start();
require_once('../../connect.php');
#if($_SERVER["HTTP_REFERER"] == "login.php"){
#$_SESSION['email'] = $_POST['email'];
#}
#else{
#echo "did not work";
#echo $_SERVER["HTTP_REFFRER"];
#}
echo "Welcome ".$_SESSION['email'];
#$password = $_POST['password'];

?>
        <br><br>

        <header>
            <h1>Current Listings</h1>
	    <label>Use the drop down menu to choose a catagory to see the items that are available for purchase. Click on the buy button to purchase an item and get the seller's information. <br></label>
<br>
	</header>

<label>Please Choose a Catagory</label>
<form action='listings.php' method=\"GET\">
<select name="itemName">
<?php
if(isset($_GET["selectedName"])){
	echo "<option value=\"SelectItem\" disabled>Select An Item</option>";
}else{
	echo "<option value=\"SelectItem\" disabled selected>Select An Item</option>";
}
$query= "SELECT itemName FROM item WHERE itemApproval=1 AND itemNumber NOT IN(select itemNumber FROM sale) GROUP BY itemName";
$qr= $conn->query($query);
#$qr = $qr->fetch();
?>

<?php
foreach($qr as $option){
	if($option["itemName"]==$_GET["itemName"]){
		echo "<option name=\"$option[itemName]\" value=\"$option[itemName]\" selected> $option[itemName] </option>";
	}else{		
		echo "<option name=\"$option[itemName]\" value=\"$option[itemName]\"> $option[itemName] </option>";
	}
} 
?>
<!--<input type='hidden' name='itemName' id='itemName' value='<?php $queryObject[itemName] ?>'>  -->
<input type='submit' value='go' />
</form>

	<!--<option value="barstool">Barstool</option>
	<option value="bedFrame">Bed Frame</option>
	<option value="bedsideTable">Bedside Table</option>
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
	-->
</select>
<?php
#$query = "SELECT * FROM item WHERE itemName = 'lamp' AND itemApproval = 1";


if(empty($_GET['selectedName'])){
echo $_GET['selectedName'];	
#$query = "SELECT * from item INNER JOIN sale ON item.itemNumber = sale.itemNumber WHERE item.itemName=\"". $_GET['itemName']."\" AND item.itemApproval = 1 AND item.itemNumber NOT IN(SELECT itemNumber FROM sale)";
$query = "SELECT * from item where itemName=\"".$_GET['itemName']."\" AND itemApproval = 1 AND itemNumber NOT IN(SELECT itemNumber FROM sale)";
#echo $query;
?>

<table align="center" border="0px">
<!--	<tr>
		<th colspan="5"><h2>Items for sale</h2></th>
	</tr>-->	
<?php
#	$query= "SELECT * from item";
	
	
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
#	$query= "SELECT * FROM sale WHERE itemNumber = ".$queryObject['itemNumber'];
#	$saleResult = $conn->query($query);
#	while($saleResult->rowCount() != 0){
#		$queryObject = $qr->fetch();	
#		$query= "SELECT * FROM sale WHERE itemNumber = ".$queryObject['itemNumber'];
#		$saleResult = $conn->query($query);
	
#	}

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
	  echo "<form action='purchaseForm.php' method=\"GET\">
		<input type='hidden' name='itemNumber' id='itemNumber' value='$queryObject[itemNumber]'>  
		<input type='submit' value='buy this item' />
		</form>";
	echo "</td>";	
	}#if
	} #for
	?>

<?php
	echo "</tr>";
	$counter+=5;
	} #while 
	} #if
	else{
	echo "No Catagory Selected";
	}#else
$queryObject = $qr->fetch();	
}
?>





      <footer>
            <p> Rebel Marketplace &#169; 2021</p>
          </footer>  
    </body>
</html>
