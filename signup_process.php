<?php
session_start();
include("db.php"); //include db.php file to connect to DB

mysqli_report(MYSQLI_REPORT_OFF);

$pagename = "sign up results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include("headfile.html"); //include header layout file

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

//Capture the 7 inputs entered in the 7 fields of the form using the $_POST superglobal variable
//Store these details into a set of 7 new local variables
$fname = trim ($_POST['r_firstname']);
$lname = trim ($_POST['r_lastname']);
$address = trim ($_POST['r_address']);
$postcode = trim ($_POST['r_postcode']);
$telno = trim ($_POST['r_telno']);
$email = trim ($_POST['r_email']);
$password1 = trim ($_POST['r_password1']);
$password2 = trim ($_POST['r_password2']);

//Create a regular expression variable
$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

//Check if any of the variables that captured the posted values are empty
if (empty($fname) or empty($lname) or empty($address) or empty($postcode) or empty($telno) or empty($email) or empty($password1) or empty($password2)) 
{
	echo "<p><b>Your Sign-up failed!</b></p>";
    echo "<br><p>All the mandatory fields need to be filled in.</p>";
    echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
	echo "<br><br><br><br>";
} 
elseif ($password1 <> $password2) //if the 2 entered passwords do not match
{
	echo "<p><b>Your Sign-up failed!</b></p>";
    echo "<br><p>The two passwords are not matching.</p>";
    echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
	echo "<br><br><br><br>";
}
elseif (!preg_match($reg, $email)) ////if email matches the regular expression 
{
	echo "<p><b>Your Sign-up failed!</b></p>";
    echo "<br><p>Please insert your e-mail address correctly.</p>";
    echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
	echo "<br><br><br><br>";
}
else
{
	//Write SQL query to insert a new user into users table and execute SQL query
	$SQL="insert into Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
	values 
	('c', '".$fname."', '".$lname."', '".$address."', '".$postcode."', '".$telno."', '".$email."', '".$password1."')";
	
	// Execute INSERT INTO SQL query, if SQL execution is correct
	if (mysqli_query($conn, $SQL))
	{
		//Display signup success
		echo "<p><b>Sign-up Complete</b></p>";
        echo "<br><p>Go to Log in Page: <a href=login.php>login</a></p>";
	}
	//else, if the SQL execution is erroneous, there is a problem
	else
	{
		//Display sign up failure
		echo "<p><b>Sign-up failed!</b></p>";
		
		//echo "<br><p>SQL Error No: ".mysqli_errno($conn)."</p>"; //Retrieve the error number and display.
		//echo "<p>SQL Error Msg: ".mysqli_error($conn)."</p>"; //Retrieve the error message and display.
		
		//if the error detector returned the number 1062,
		//the unique constraint is violated as the user entered an email which already existed
		if (mysqli_errno($conn) == 1062) 
		{
            echo "<br><p>An account with your e-mail is already registered.</p>";
        }
		//error code for inserting characters that is problematic for SQL query
		if (mysqli_errno($conn) == 1064) 
		{
            echo "<br><p>Invalid characters used<br>";
            $invalidchars="apostrophes like ['] and backslashes like [\]";
			//echo "Make sure you avoid the following characters: ".$invalidchars. "</p>";
		}
            echo "<br><p>Go back to <a href=signup.php>sign up</a></p>";
			echo "<br><br><br><br>";
    }
}

include("footfile.html"); //include foot layout

echo "</body>";
?>