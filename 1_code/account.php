<?php

session_start();

require('connect.php');
if (@$_SESSION["email"])
{
	

?>

<html>
<head>
	<title>Account Page</title>
</head>

	
		<?php include("header.php"); ?>
		<style>
body{
		  background: url(stock.jpg);

		   background-size: 1300px 700px;
}




</style>

	<body>
		<center>
		<?php
	$check=mysqli_query($connect,"SELECT * FROM users WHERE email='".$_SESSION['email']."'");
	$rows=mysqli_num_rows($check);
	while($row=mysqli_fetch_assoc($check))
	{
		$username=$row['firstname'];
		$id=$row['id'];
		$email=$row['email'];
		$score=$row['lastname'];
		$date=$row['date'];
		$prof_pic=$row['profile_pic'];
	}
		?>
		<br><br> <br> 
		<?php echo "<img src='$prof_pic' width='90' height='90'>";?>
		<br><br><br>  <b>FIRSTNAME:</b><?php echo $username; ?><br><br>
		<b>LASTNAME:</b><?php echo $score; ?><br><br>
		<b>EMAIL:</b><?php echo $email; ?><br><br>
		<b>DATE JOINED:</b><?php echo $date; ?><br><br>
		
</center>
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