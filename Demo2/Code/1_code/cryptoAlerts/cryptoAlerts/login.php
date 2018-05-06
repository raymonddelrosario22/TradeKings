<html>

<head> <title>Login with your account </title></head>


<body>
	<form action="login.php" method="POST">
		Email: <input type="text" name="email"> <br> 
		Password: <input type="password" name="password"><br><br>
		<input type="submit" value="Login" name="submit">
		or <a href="register.php">Register</a>

	</form>
</body>
</html>


<?php

session_start();

require('connect.php');
$username=@$_POST['email'];
$password=@$_POST['password'];

if (isset($_POST['submit']))
{
	if($username && $password)
	{
		$check=mysqli_query($connect,"SELECT * FROM users WHERE email='".$username."'");
		$rows=mysqli_num_rows($check);

		if(mysqli_num_rows($check)!=0)
		{
			while($row=mysqli_fetch_assoc($check))
			{
				$db_username=$row['email'];
				$db_password=$row['password'];
			}
			if($username==$db_username && sha1($password)==$db_password)
			{
				@$_SESSION["email"]=$username;
				header("Location: check.php");
			}
			else
			{
				echo "Password doesn't match";
			}
		}
		else
		{
			die( "Counldn't find username.");
		}
	}
	else
	{
		echo "Please validate all the fields.";
	}
}

?>