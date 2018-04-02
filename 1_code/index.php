<?php

session_start();

require('connect.php');
if (@$_SESSION["email"])
{
	

?>

<html>

<style>
h1{
	font-size:300%;
}

</style>
<head>
	<title>Home Page</title>
</head>
	<?php include("header.php"); ?>

	<br> <br>
	<center>
		<h1>Ⓣⓡⓐⓓⓔ Ⓚⓘⓝⓖⓢ Ⓕⓞⓡⓤⓜ</h1>
		
		
		<a href="post.php"><button>Post Topic</button></a>
		<br>
		<br>
		<?php echo '<table border="3px;">'; ?>
		
			<tr>
				<td>
					<span>ID</span>
			    </td>
			    <td border= "2px;" width="400px"; style="text-align:center;">TOPIC NAME
			    </td>
			    <td width="80px"; style="text-align:center;">VIEWS
			    </td>
			     <td width="80px"; style="text-align:center;">CREATOR
			    </td>
			    <td width="80px"; style="text-align:center;">DATE
			    </td>

			</tr>
		
	</center>
	<style>
body{
		  background: url(stock.jpg);

		   background-size: 1300px 700px;
}


table, th, td {
   border: 2px solid black;
 	background-color: #E8F8F5;

}

</style>
	<body style="">
				
	</body>
</html>

<?php
	$check=mysqli_query($connect, "SELECT * FROM topics");

	if(mysqli_num_rows($check) !=0)
	{
		while($row=mysqli_fetch_assoc($check))
		{	$id=$row['topic_id'];
			echo"<tr>";
			echo "<td style='text-align:center';>".$row['topic_id']."</td>";
			echo "<td><center><a href='topic.php?id=$id'>".$row['topic_name']."</a></center></td>";
			echo "<td style='text-align:center';>".$row['views']."</td>";
			echo "<td style='text-align:center';>".$row['topic_creator']."</td>";
			echo "<td style='text-align:center';>".$row['date']."</td>";

			echo"</tr>";

		
		}
	}
	else
	{
		echo "NO TOPICS FOUND";
	}
	echo "</table>";

	if(@$_GET['action']=="logout")
	{
		session_destroy(); 
		@header("Location:login.php");
	}
}else
{
	echo "You are not logged in.";
}

?>