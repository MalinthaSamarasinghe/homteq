<?php
session_start();	//Initiate the session

include("db.php");	//Connect to the database

mysqli_report(MYSQLI_REPORT_OFF);	//Deactivate the automatic error messaging 

$pagename="checkout"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file 
include ("detectlogin.php"); //Include the detectlogin.php file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//store the current date and time in a local variable $currentdatetime
//use the date PHP function with the 'Y-m-d H:i:s' parameters to make it compatible with the MySQL format.
$currentdatetime = date('Y-m-d H:i:s');

//write a SQL query to insert a new record in the Orders table to generate a new order. 
//insert the id of the user who is placing the order $_SESSION ['userId']
//insert the current date and time for the date and time when the order has been placed
//insert the word 'Placed' for the order status to indicate that the order has now been placed.
$SQL = "INSERT into Orders (userId, orderDateTime, orderStatus) 
VALUES ('".$_SESSION['userid']."','".$currentdatetime."', 'Placed')";

//if execution of SQL query to add new order correct and session basket is set and nb of elements in session is > 0
if (mysqli_query($conn, $SQL) and isset($_SESSION['basket']) and count($_SESSION['basket'])>0)
{
	//SQL SELECT query to retrieve max order number for current user (for which id matches the id in the session)
	//to retrieve the order number of most recent order placed by current user i.e. the order just created
	$maxSQL = "SELECT max(orderNo) as maxOrderNo, userId FROM Orders WHERE userId =".$_SESSION['userid'];
	
	//execute SELECT SQL query
	$exemaxSQL = mysqli_query($conn, $maxSQL) or die (mysqli_error($conn));
	
	//fetch the result of the execution of the SQL statement and store it in an array arrayo
	$arrayo = mysqli_fetch_array($exemaxSQL);
	
	//store the value of this order number in a local variable and display the order number.
	$orderno = $arrayo['maxOrderNo'];
	
	//Display "order success" message and order number message
	echo "<p style='padding-left: 32px;'>The Order has been placed successfully. The order number is:  <b>".$orderno."</b></p><br>";
	
	$total = 0;
	
	//as for basket.php, display a table header for product name, price, quantity and subtotal 
	echo "<table id='checkouttable'>";
	
	echo "<tr>";
	echo "<th>Product name</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	echo "<th>Subtotal</th>";
	echo "</tr>";
	
	//as for basket.php, FOREACH loop through basket session array & split value from index for every cell
	foreach($_SESSION['basket'] as $index => $value)
	{
		//SQL query to retrieve product id, name and price from product table for every index in FOREACH loop
		$SQLb="select prodId, prodName, prodPrice from Product WHERE prodId = ".$index;
		
		//execute SQL query, fetch the records and store them in an array of records $arrayb.
		$exeSQLb = mysqli_query($conn, $SQLb) or die (mysqli_error($conn));
		$arrayb = mysqli_fetch_array($exeSQLb);
		
		//Calculate subtotal
		//Note: these 3 instructions are the same as in basket.php
		$subtotal = $value * $arrayb['prodPrice'];
		
		//SQL INSERT query to store details of ordered items in Order_line table in the DB i.e. order number, 
		//product id (index), ordered quantity (content of the session array) and subtotal. Execute INSERT query.
		$SQLol = "INSERT into Order_Line(orderNo, prodId, quantityOrdered, subTotal) 
		VALUES ('".$orderno."', '".$index."','".$value."','".$subtotal."')";
		$exeSQLol = mysqli_query($conn, $SQLol) or die (mysqli_error($conn));

		echo "<tr>";
		//display the product name, price, ordered quantity and subtotal (same as for basket.php)
		echo "<td>".$arrayb['prodName']."</td>";
		echo "<td>&pound".$arrayb['prodPrice']."</td>";
		echo "<td>".$value."</td>";
		echo "<td>&pound".$subtotal."</td>";
		echo "</tr>";
		//increment total (same as for basket.php)
		$total = $total + $subtotal;
	}
	
	//create a new table row to display the total (same as for basket.php)
	echo "<tr>";
	echo "<th colspan='3'>TOTAL</th>";
	echo "<th>&pound".$total."</th>";
	echo "</tr>";
	
	echo "</table>";
	
	//SQL UPDATE query to update the total value in the Orders table for this specific order
	$SQLo="UPDATE Orders 
	SET orderTotal=".$total." 
	WHERE orderNo=".$orderno;
	
	//execute UPDATE SQL query.
	$exeSQLo = mysqli_query($conn, $SQLo) or die (mysqli_error($conn));
}
else
{
	//Display "order error" message
	echo "<p style='padding-left: 32px;'><b>Error with the placing of your order!</b></p>";
}

unset($_SESSION['basket']);

include("footfile.html"); //include head layout

echo "</body>";
?>