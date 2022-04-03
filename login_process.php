<?php
session_start();
include("db.php");
$pagename="login results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file 

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//capture the 2 values entered by the user in the form using the $_POST superglobal variable 
//assign these 2 values to 2 local variables
$email = $_POST['l_email'];
$password = $_POST['l_password'];

//display the content of the local variables to make sure the values are passed properly
echo "<p>Login email: ".$email."</p>";
echo "<p>Login pwd: ".$password."</p>";

//if either the $email or the $password is empty	(hint: use the empty function)
if (empty($email) or empty($password))  
{
	//Display error "Both email and password fields need to be filled in" message and link to login page
	echo "<p><b>Login failed!</b>"; //display login error
	echo "<br>login form incomplete.";
	echo "<br>Make sure you provide all the required details.</p>";
	echo "<br><p> Go back to <a href=login.php>login</a></p>";
}
else
{
	//SQL query to retrieve the record from the users table for which the email matches login email (in form)
	$SQL = "SELECT * FROM Users WHERE userEmail = '".$email."'"; //retrieve record if email matches
	
	//execute the SQL query & fetch results of the execution of the SQL query and store them in $arrayu 
	$exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn)); //execute SQL query
	
	//also capture the number of records retrieved by the SQL query using function mysqli_num_rows and store it 
	//in a variable called $nbrecs
	$nbrecs = mysqli_num_rows($exeSQL); //retrieve the number of records

	//if the number of records is 0 (i.e. email retrieved from the DB does not match $email login email in form
	if ($nbrecs ==0) //if nb of records is 0 i.e. if no records were located for which email matches entered email
	{ 
		//display error message "Email not recognised, login again"
		echo "<p><b>Login failed!</b>"; //display login error
		echo "<br>Email not recognised.</p>";
		echo "<br><p> Go back to <a href=login.php>login</a></p>";
	}
	else 
	{
		$arrayuser = mysqli_fetch_array($exeSQL); //create array of user for this email

		//if password retrieved from the database (in arrayu) does not match $password
		if ($arrayuser['userPassword'] <> $password) //if the pwd in the array matches the pwd entered in the form
		{ 
			//display error message "Password not recognised, login again"
			echo "<p><b>Login failed!</b>"; //display login error
			echo "<br>Password not valid.</p>";
			echo "<br><p> Go back to <a href=login.php>login</a></p>";
		}
		else 
		{
			//display login success message and store user id, user type, name into 4 session variables i.e.
			echo "<p><b>Login success!</b></p>"; //display login success
			
			//create $_SESSION['userid'], $_SESSION['usertype'], $_SESSION['fname'], $_SESSION['sname'],
			$_SESSION['userid'] = $arrayuser['userId']; //create session variable to store the user id
			$_SESSION['fname'] = $arrayuser['userFName']; //create session variable to store the user first name
			$_SESSION['sname'] = $arrayuser['userSName']; //create session variable to store the user surname
			$_SESSION['usertype'] = $arrayuser['userType']; //create session variable to store the user type
			
			//Greet the user by displaying their name using $_SESSION['fname'] and $_SESSION['sname']
			//Welcome them as a customer by using $_SESSION['usertype ']
			echo "<p>Welcome, ". $_SESSION['fname']." ".$_SESSION['sname']."</p>"; //display welcome greeting
 
			if ($_SESSION['usertype']=='C') //if user type is C, they are a customer
			{ 
				echo "<p>User Type: homteq Customer</p>";
			}
			
			if ($_SESSION['usertype']=='A') //if user type is A, they are an admin
			{ 
				echo "<p>User type: homteq Administrator</p>";
			}
 
			echo "<br><p>Continue shopping for <a href=index.php>Home Tech</a>";
			echo "<br>View your <a href=basket.php>Smart Basket</a></p>";
		}
	}

include("footfile.html"); //include head layout

echo "</body>";
?>