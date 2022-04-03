<?php
session_start();
$pagename="login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file 

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//create a HTML form to capture the user's email and password
echo "<form action=login_process.php method=post>";
echo "<table style='border: 0px; margin-left: 300px; background-color: #ffffff; border-radius: 20px'>";

	//create text field called l_email to capture user’s input for the email
	echo "<tr>"; 
		echo "<td style='border:0px; padding-left:25px; padding-top:25px'>E-mail: </td>";
		echo "<td style='border:0px; padding-right:25px; padding-top:25px'><input type=text name=l_email size=35></td>";
	echo "</tr>";
	
	//create text field called l_password to capture user’s input for the password
	echo "<tr>";
		echo "<td style='border:0px; padding-left:25px'>Password: </td>";
		echo "<td style='border:0px; padding-right:25px'><input type=password name=l_password maxlength=10 size=35></td>";
	echo "</tr>";

	//create a submit button and reset button
	echo "<tr>";
		echo "<td style='border:0px; padding-left:25px'><input type=reset value='Clear Form' name=submitbtn id='submitbtn'></td>";
		echo "<td style='border:0px; padding-left: 200px'><input type=submit value='Login' name=submitbtn id='submitbtn'></td>";
	echo "</tr>";

echo "</table>";
echo "</form>";

include("footfile.html"); //include head layout

echo "</body>";
?>