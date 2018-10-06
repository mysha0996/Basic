<?php
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];

	if($username && $password)
	{
		$connect=mysqli_connect("localhost","root","","phplogin") or die ("Couldn't connect");
		$query=mysqli_query($connect,"SELECT * FROM users WHERE username='$username'");

		$numrows=mysqli_num_rows($query);

		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
			}

		if($username==$dbusername && $password==$dbpassword)
		{
				echo "You're in..! <a href='member.php'>Click</a>  here to enter into the member page";
				$_SESSION['username']=$username;
		}
		else
			echo "Incorrect password!";
		}
		else
			die("That user doesn't exist ");
	}
	else 
		die("Please enter a username and a password!")

?>