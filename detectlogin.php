<?php

//if the session user id $_SESSION['userid'] is set (i.e. if the user has logged in successfully)
if (isset($_SESSION['userid']))
{
	//display first name and surname on the right hand-side, right under the navigation bar
	echo "<p style='float: right'>👤 ".$_SESSION['fname']." ".$_SESSION['sname']." | User type: ".$_SESSION['usertype']."</p><br>";
}

?>