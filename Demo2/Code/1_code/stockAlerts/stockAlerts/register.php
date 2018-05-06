<!doctype html>


<html>

<title> Register </title>


<body>

	<form action="register.php" method="POST">

		Firstname: <input type="text" name="firstname">
		<br>
    Lastname: <input type="text" name="lastname">
    <br>
		Password:<input type="password" name="password">
		<br>
		Confirm password:<input type="password" name="repassword">
		<br>
		Email:<input type="text" name="email">
		<br>
		<input type="submit" name="submit" value="Register"> or <a href="login.php">Login </a>
	</form>


</body>
</html>


<?php 
 
 require('connect.php');

 $username= @$_POST['firstname'];
  $password= @$_POST['password'];
  $repass= @$_POST['repassword'];
  $email= @$_POST['email'];
  $date=date("Y-m-d");
   $lastname=@$_POST['lastname'];

$pass_en=sha1($password);


  if(isset($_POST['submit']))
  {
  	if($username && $password && $email)
  	{
  			if(strlen($username)>=5 && strlen($username) <25 && strlen($password)>6)
  			{
  				if($password==$repass)
  				{
  					  if ($query= mysqli_query($connect,"INSERT INTO users (`id`,`firstname`,`lastname`,`password`,`email`,`date`) VALUES('','".$username."','".$lastname."','".$pass_en."','".$email."','".$date."')"))

  			echo "You have been registered as $username. Click <a href='login.php'>here </a> to login";
  		else{
  			echo "FAILURE";
  	}


  				}
  				else
  				{
  					echo "Passwords don't match!!";
  				}
  				
  			}
  				else
  				{
  					if(strlen($username)<5 || strlen($username)>25)
  					{
  						echo "Username must be between 5 and 25 characters";
  					}
  					if(strlen($password)<6)
  					{
  						echo "Password must be longer than 6 characters";
  					}

  				}
  	}
  	else
  	{
  		echo "FILL OUT ALL THE FIELDS";
  	}





  }

?>