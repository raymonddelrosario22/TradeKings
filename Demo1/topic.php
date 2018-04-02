<?php

session_start();

require('connect.php');
if (@$_SESSION["email"])
{
?>

<html>
<head>
	<title>Topic Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
	<?php include("header.php"); ?>

	<br> <br>
	<center>

<?php 	$id=$_GET["id"];
		echo"<a href='reply.php?id=$id'><button>REPLY</button></a><br> <br>";
			?>
		
		<?php 
		if($_GET["id"])
		{	
			$upper=mysqli_query($connect,"UPDATE topics SET views=views+1 WHERE topic_id='".$_GET['id']."'");

			$check=mysqli_query($connect,"SELECT * FROM topics WHERE topic_id='".$_GET['id']."'");
			if (mysqli_num_rows($check))
			{
				while($row=mysqli_fetch_assoc($check))
				{
					$check_u=mysqli_query($connect,"SELECT * FROM users WHERE email='".$row['topic_creator']."'");
					while($row_u=mysqli_fetch_assoc($check_u))
					{
						$user_id=$row_u['id'];

					}
					echo "<h1>".$row['topic_name']."</h1>";
					echo "<h5>By:<a href='profile.php?id=$user_id'> ".$row['topic_creator']."</a><br> Date: ".$row['date']."</h5>";

					echo '<table border="1px;" style="border-top-width: 12px; border-collapse:collapse;" height=90px; width=1000px; style=""> <tr>';
					
					echo "<td width='150px'; style='text-align:center;'>🆄🆂🅴🆁</td>";
					echo "<br><td> ".$row['topic_content']."</td>";

				
					echo "<td width='75px'; style='text-align:center;'>🅳🅰🆃🅴</td>";


					echo "</tr></table>";

					echo "<br>";
				}
			//

				$checkx=mysqli_query($connect,"SELECT * FROM reply WHERE r_topic_id='".$_GET['id']."'");
			if (mysqli_num_rows($checkx))
			{
				while($rowx=mysqli_fetch_assoc($checkx))
				{
					$check_u=mysqli_query($connect,"SELECT * FROM users WHERE email='".$row['topic_creator']."'");
					while($row_u=mysqli_fetch_assoc($check_u))
					{
						$user_id=$row_u['id'];
						
					}
				

					echo '<table border="1px;" style="border-top-width: 12px; border-collapse:collapse;" width=1000px; height=80px; > <tr>';
					echo "<td width='150px'; style='text-align:center;'>".$rowx['r_user']."</td>";
					echo "<td>&nbsp ".$rowx['r_content']."</td>";
					echo "<td width='75px'; style='text-align:center;'>".$rowx['r_date']."</td>";
					echo "</tr></table>";
					echo"<br>";

				}

			//



			}


			}
			else
			{
				echo "TOPIC NOT FOUND";
			}
		}
		else
		{
			header("Location:index.php");
		}


		?>
				<style>
body{
		  background-color:#E8F8F5;
}

table{
	background-color:white;
}



</style>
		
	<body>
		
	</body>
</html>

<?php
}else
{
	echo "You are not logged in.";
}
?>