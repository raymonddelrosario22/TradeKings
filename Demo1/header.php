<?php

if(@$_SESSION['email'])
{


?>







<center> <b><a href="index.php">Home </a> &nbsp | &nbsp<a href="members.php"> Members</a>  &nbsp| <a href="account.php">&nbspMy Account</a> &nbsp|<?php 
$check=mysqli_query($connect,"SELECT * FROM users WHERE email='".$_SESSION['email']."'");
	$rows=mysqli_num_rows($check);
	while($row=mysqli_fetch_assoc($check))
	{
		$id=$row['id'];

	}

	echo "&nbsp Logged in as <a href='profile.php?id=$id'>";
	echo @$_SESSION['email']."</a> &nbsp|&nbsp";
	?>

<a href="index.php?action=logout"> Logout</a> </center> </b>

<?php
}else
{
	header("Location: login.php");
}



?>