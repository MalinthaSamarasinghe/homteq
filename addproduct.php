<?php
session_start();	//Initiate the session
$pagename="admin: add a new product"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file 
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//Create a HTML form to capture the user's details
echo "<form action='addproduct_process.php' method='post'>";
echo "<table id='checkouttable' style='border: 0px; margin-left: 300px; background-color: #ffffff; border-radius: 20px'>";

echo "<tr><td padding-left:25px; padding-top:25px'>Product Name: </td>";
echo "<td padding-right:25px; padding-top:25px'><input type=text name=pname size=35></td></tr>";

echo "<tr><td padding-left:25px'>Small Picture Name: </td>";
echo "<td padding-right:25px'><input type=text name=spicname size=35></td></tr>";

echo "<tr><td padding-left:25px'>Large Picture Name: </td>";
echo "<td padding-right:25px'><input type=text name=lpicname size=35></td></tr>";

echo "<tr><td padding-left:25px'>Short Description: </td>";
echo "<td padding-right:25px'><input type=text name=shortdesc size=35></td></tr>";

echo "<tr><td padding-left:25px'>Long Description: </td>";
echo "<td padding-right:25px'><input type=text name=longdesc size=35></td></tr>";

echo "<tr><td padding-left:25px'>Price: </td>";
echo "<td padding-right:25px'><input type=text name=price size=35></td></tr>";

echo "<tr><td padding-left:25px'>Initial Stock Quantity: </td>";
echo "<td padding-right:25px'><input type=password name=stockquantity maxlength=10 size=35></td></tr>";

echo "<tr>";
echo "<td padding-left:25px'><input type=submit value='Add Product' name=submitbtn id='submitbtn'></td>";
echo "<td padding-left: 170px'; padding-right:25px><input type=reset value='Clear Form' name=submitbtn id='submitbtn'></td>";
echo "</tr>";

echo "</table>";
echo "</form>";

include("footfile.html"); //include head layout

echo "</body>";
?>