<?php

session_start();

require('connect.php');
if (@$_SESSION["email"])
{
	

?>

<html>
<head>
	<title>Profile Page</title>
</head>
		<style>
body{
		  background: url(stock.jpg);

		   background-size: 1300px 700px;
}




</style>
	<body>
		<?php include("header.php");

		if (@$_GET['id'])
		{	echo"<center>";
			$check=mysqli_query($connect,"SELECT * FROM users WHERE id='".$_GET['id']."'");
			$rows=mysqli_num_rows($check);
			if(mysqli_num_rows($check) !=0)
			{
				while($row=mysqli_fetch_assoc($check))
				{
					echo "<h1 style='font-family: Courier New, Times, serif; text-shadow: 2px 2px #ff0000; font-size: 60px;'>".$row['firstname']." ".$row['lastname']."</h1><img src='".$row['profile_pic']."' width='80' height='80'><br><br><br>";
					echo "<br><br><b>FIRSTNAME:</b>".$row['firstname']."<br><br>";
					echo "<b>LASTNAME:</b>".$row['lastname']."<br><br>";
					echo "<b>EMAIL:</b>".$row['email']."<br><br>";
					echo "<b>DATE REGISTERED:</b>".$row['date'];
				
				
				

				}
			}
			else
			{
				echo "ID NOT FOUND";
			}
		}
else
{
	header("Location:index.php");
}
		echo"</center>";
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