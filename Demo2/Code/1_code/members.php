<?php

session_start();

require('connect.php');
if (@$_SESSION["email"])
{
	

?>


<html>
<head>
	<title>Members Page</title>
</head>
<style>
body{
		  background: url(stock.jpg);
		   background-size: 1300px 700px;
}
</style>

	<body >
		 
		<?php include("header.php"); 
		echo "<center><h1 style='font-family: Courier New, Times, serif; text-shadow: 2px 2px #ff0000; font-size: 60px;'>MEMBERS</h1>";

		$check=mysqli_query($connect,"SELECT * FROM users");
		$rows=mysqli_num_rows($check);

		while($row=mysqli_fetch_assoc($check))
		{	
			$id=$row['id'];
			
			echo "<h3 ><a href= 'profile.php?id=$id'>".$row['email']."</a></h3>";
		}

		echo "</center>";

		?>
	</body>
</html>

<?php
	if(@$_GET['action']=="logout")
	{
		session_destroy();
		header("Location:login.php");
	}
}else
{
	echo "You are not logged in.";
}

?>