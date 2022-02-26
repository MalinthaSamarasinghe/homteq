<?php
$pagename="sign up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file 

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//Create a HTML form to capture the user's details
echo "<form action='signup_process.php' method='post'>";
echo "<table style='border: 0px; margin-left: 300px; background-color: #ffffff; border-radius: 20px'>";

echo "<tr><td style='border:0px; padding-left:25px; padding-top:25px'>First Name: </td>";
echo "<td style='border:0px; padding-right:25px; padding-top:25px'><input type=text name=r_firstname size=35></td></tr>";

echo "<tr><td style='border:0px; padding-left:25px'>Last Name: </td>";
echo "<td style='border:0px; padding-right:25px'><input type=text name=r_lastname size=35></td></tr>";

echo "<tr><td style='border:0px; padding-left:25px'>Address: </td>";
echo "<td style='border:0px; padding-right:25px'><input type=text name=r_address size=35></td></tr>";

echo "<tr><td style='border:0px; padding-left:25px'>PostCode: </td>";
echo "<td style='border:0px; padding-right:25px'><input type=text name=r_postcode size=35></td></tr>";

echo "<tr><td style='border:0px; padding-left:25px'>Tel No: </td>";
echo "<td style='border:0px; padding-right:25px'><input type=text name=r_telno size=35></td></tr>";

echo "<tr><td style='border:0px; padding-left:25px'>Email Address: </td>";
echo "<td style='border:0px; padding-right:25px'><input type=text name=r_email size=35></td></tr>";

echo "<tr><td style='border:0px; padding-left:25px'>Password: </td>";
echo "<td style='border:0px; padding-right:25px'><input type=password name=r_password1 maxlength=10 size=35></td></tr>";

echo "<tr><td style='border:0px; padding-left:25px'>Confirm Password: </td>";
echo "<td style='border:0px; padding-right:25px'><input type=password name=r_password2 maxlength=10 size=35></td></tr>";

echo "<tr>";
echo "<td style='border:0px; padding-left:25px'><input type=submit value='Sign Up' name=submitbtn id='submitbtn'></td>";
echo "<td style='border:0px; padding-left: 170px'; padding-right:25px><input type=reset value='Clear Form' name=submitbtn id='submitbtn'></td>";
echo "</tr>";

echo "</table>";
echo "</form>";

include("footfile.html"); //include head layout

echo "</body>";
?>