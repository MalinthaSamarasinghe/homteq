<?php
session_start();
include("db.php"); //include db.php file to connect to DB

mysqli_report(MYSQLI_REPORT_OFF);

$pagename = "admin: new product"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include("headfile.html"); //include header layout file
include ("detectlogin.php");

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

$pname = $_POST['pname'];
$spicname = $_POST["spicname"];
$lpicname = $_POST["lpicname"];
$shortdesc = $_POST["shortdesc"];
$longdesc = $_POST["longdesc"];
$price = $_POST["price"];
$stockquantity = $_POST["stockquantity"];

if (!(empty($pname) || empty($spicname) || empty($lpicname) || empty($shortdesc) || empty($longdesc) || empty($price) || empty($stockquantity))) 
{

    //create a $SQL variable and populate it with a SQL statement that saves product details
    $SQL = "insert into Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity) 
	values ('".$pname."', '".$spicname."', '".$lpicname."', '".$shortdesc."', '".$longdesc."', ".$price.", ".$stockquantity.")";
		
    //run SQL query for connected DB or exit and display error message
    mysqli_query($conn, $SQL);

    if (mysqli_errno($conn) == 0) {
        echo "<p style='padding-left: 32px;'>The product <b>" .$pname. "</b> has been added!</p>";
        echo "<br><p style='padding-left: 32px;'><b>Small pic name:  </b>" .$lpicname. "</p>";
        echo "<br><p style='padding-left: 32px;'><b>Large pic name:  </b>" .$spicname. "</p>";
        echo "<br><p style='padding-left: 32px;'><b>Short Description: </b>" .$shortdesc. "</p>";
        echo "<br><p style='padding-left: 32px;'><b>Long Description: </b>" .$longdesc. "</p>";
        echo "<br><p style='padding-left: 32px;'><b>Price:</b> &pound" .$price. "</p>";
        echo "<br><p style='padding-left: 32px;'><b>Initial Quantity: </b>" .$stockquantity. "</p>";
        
    } 
	else 
	{
        echo "<p style='padding-left: 32px;'><b>The product was not added!</b></p><br>";
        
		if (mysqli_errno($conn) == 1062)
		{
            echo "<p style='padding-left: 32px;'>Product name is already in use.<br>";
            echo "Please try another product name.</p><br>";           
        }

        if (mysqli_errno($conn) == 1064) 
		{
            echo "<p style='padding-left: 32px;'>Illegal characters was entered in the form.<br>";
            echo "Make sure you avoid the following characters: apostrophes like ['] and backslashes like [\].</p></br>";    
        }

        if (mysqli_errno($conn) == 1054) 
		{
            echo "<p style='padding-left: 32px;'>Illegal characters was entered in the form.<br>";
            echo "Make sure you enter numerical value for price and initial stock quantity.<p><br>";         
        }
        echo "<p style='padding-left: 32px;'>Go back to <a href=addproduct.php>add product</a></p>";
    }
} 
else 
{
    echo "<p><b style='padding-left: 32px;'>The product was not added!</b></p>";
    echo "<br><p style='padding-left: 32px;'>Your add product form is incomplete and all fields are mandatory.<br>";
    echo "Make sure provide all the required details.</p>";
	echo "<br><p style='padding-left: 32px;'>Go back to <a href=addproduct.php>add product</a></p>";
}

include("footfile.html"); //include foot layout

echo "</body>";
?>