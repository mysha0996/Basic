<?php
 
 session_start();
 if($_SESSION['username'])
	
	echo "Welcome,".$_SESSION['username']."!<br><a href='logout.php'>Logout";

else
	die("You must be logged in!");

?>