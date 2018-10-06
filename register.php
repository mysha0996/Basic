<?php 

echo "<h1>Register</h1>";

$submit=$_POST['submit'];

$fullname=strip_tags($_POST['fullname']);
$username=strip_tags($_POST['username']);
$password=strip_tags($_POST['password']);
$cpassword=strip_tags($_POST['cpassword']);
$date=date("Y-m-d");

if($submit)
{
	if($fullname&&$username&&$password&&$cpassword)

	{
		

		if($password==$cpassword)
		{
			if(strlen($username)>25 || strlen($fullname)>25)
			{
				echo "Length of username or fullname is too long!";
			}
			else
			{
				if(strlen($password)>25||strlen($password)<6)
				{
					echo "Password must be between 6 and 25 characters ";
				}
				else
				{
					$password=md5($password);
					$cpassword=md5($cpassword);

					$connect=mysqli_connect("localhost","root","","phplogin") ;
					$queryreg=mysqli_query($connect,"

						INSERT INTO users VALUES('','$fullname','$username','$password','$date')

						");

						die("You have been registered! <a href='index.php'>Return to login page</a>");

					

					echo "Success!!";
				}
			}
		}
		else
			echo "Your password doesn't match.";
	}	
	else
		echo "Please fill in <b> all</b> fields.!";
}

?>
<html>
	<form action='register.php' method='POST'>
		<table>
			<tr>
				<td>Your full name:</td>
				<td><input type="text" name="fullname" value="	<?php echo $fullname?>"></td>
			</tr>

			<tr>
				<td>Choose a username:</td>
				<td><input type="text" name="username" value="<?php echo $username?>"></td>
			</tr>

			<tr>
				<td>Password:</td>
				<td><input type="password" name="password"></td>
			</tr>

			<tr>
				<td>Confirm Your Password:</td>
				<td><input type="password" name="cpassword"></td>
			</tr>
			
			<table>
				<p><input type="submit" name="submit" value="Register">
			
</html>