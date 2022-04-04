<?php

//if the session user id $_SESSION['userid'] is set (i.e. if the user has logged in successfully)
if (isset($_SESSION['userid']))
{
	if ($_SESSION['usertype']== "c" || $_SESSION['usertype']== "C") //if user type is C, they are a customer
	{ 
		//display first name and surname on the right hand-side, right under the navigation bar
		echo "<p style='float: right'>👤 ".$_SESSION['fname']." ".$_SESSION['sname']." | User type: Customer</p><br>";
	}
			
	if ($_SESSION['usertype']=='A' || $_SESSION['usertype']== "a") //if user type is A, they are an admin
	{ 
		//display first name and surname on the right hand-side, right under the navigation bar
		echo "<p style='float: right'>👤 ".$_SESSION['fname']." ".$_SESSION['sname']." | User type: Administrator</p><br>";
	}
}

?>