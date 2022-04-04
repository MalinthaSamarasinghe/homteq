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
// echo "<p style='padding-left: 32px;'>Login email: ".$email."</p>";
// echo "<p style='padding-left: 32px;'>Login pwd: ".$password."</p>";

//if either the $email or the $password is empty	(hint: use the empty function)
if (empty($email) or empty($password))  
{
	//Display error "Both email and password fields need to be filled in" message and link to login page
	echo "<p style='padding-left: 32px;'><b>Login failed!</b>"; //display login error
	echo "<br>login form incomplete.";
	echo "<br>Make sure you provide all the required details.</p>";
	echo "<br><p style='padding-left: 32px;'>Go back to <a href=login.php>login</a></p>";
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
		echo "<p style='padding-left: 32px;'><b>Login failed!</b>"; //display login error
		echo "<br>Email not recognised.</p>";
		echo "<br><p style='padding-left: 32px;'>Go back to <a href=login.php>login</a></p>";
	}
	else 
	{
		$arrayuser = mysqli_fetch_array($exeSQL); //create array of user for this email

		//if password retrieved from the database (in arrayu) does not match $password
		if ($arrayuser['userPassword'] <> $password) //if the pwd in the array matches the pwd entered in the form
		{ 
			//display error message "Password not recognised, login again"
			echo "<p style='padding-left: 32px;'><b>Login failed!</b>"; //display login error
			echo "<br>Password not valid.</p>";
			echo "<br><p style='padding-left: 32px;'>Go back to <a href=login.php>login</a></p>";
		}
		else 
		{
			//display login success message and store user id, user type, name into 4 session variables i.e.
			echo "<p style='padding-left: 32px;'><b>Login success!</b></p>"; //display login success
			
			//create $_SESSION['userid'], $_SESSION['usertype'], $_SESSION['fname'], $_SESSION['sname'],
			$_SESSION['userid'] = $arrayuser['userId']; //create session variable to store the user id
			$_SESSION['fname'] = $arrayuser['userFName']; //create session variable to store the user first name
			$_SESSION['sname'] = $arrayuser['userSName']; //create session variable to store the user surname
			$_SESSION['usertype'] = $arrayuser['userType']; //create session variable to store the user type
			
			//Greet the user by displaying their name using $_SESSION['fname'] and $_SESSION['sname']
			//Welcome them as a customer by using $_SESSION['usertype ']
			echo "<p style='padding-left: 32px;'>Welcome, ". $_SESSION['fname']." ".$_SESSION['sname']."</p>"; //display welcome greeting

			//If the value for user type retrieved from the Users table (through an array) matches the letter 'C'
			if ($_SESSION['usertype']== "c" || $_SESSION['usertype']== "C") //if user type is C, they are a customer
			{ 
				//Display a message to confirm that the user has logged in as a homteq Customer
				echo "<p style='padding-left: 32px;'>User Type: homteq Customer</p>";
				
				//Display a link to the Index Page
				echo "<br><p style='padding-left: 32px;'>Continue shopping for <a href=index.php>Home Tech</a>";
			
				//Display a link to the BasketPage
				echo "<br>View your <a href=basket.php>Smart Basket</a></p>";
			}
			
			//If the value for user type retrieved from the Users table (through an array) matches the letter 'A'
			if ($_SESSION['usertype']=='A' || $_SESSION['usertype']== "a") //if user type is A, they are an admin
			{ 
				//Display a message to confirm that the user has logged in as a homteq Administrator
				echo "<p style='padding-left: 32px;'>User type: homteq Administrator</p>";
				
				//Display a link to the Index Page
				echo "<br><p style='padding-left: 32px;'>Continue shopping for <a href=index.php>Home Tech</a>";
			}
 
			
		}
	}
}

include("footfile.html"); //include head layout

echo "</body>";
?>