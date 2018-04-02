<?php

session_start();

require('connect.php');
if (@$_SESSION["email"])
{
	

?>

<html>
<head>
	<title>Home Page</title>
</head>

		<?php include("header.php"); ?>
		<form action="post.php" method="POST">
		<center>
			<br> <br>
			Topic Name: <br><input type="text"; name="topic_name"; style="width:400px";> <br><br>
			Content: <br>
			<textarea  style="resize:none; width: 400px; height:300px"; name="con">
			</textarea>

			<br>
			<input type="submit" name="submit" value="Post" style= "width:400px;">


		</center>
	</form>

<style>
body{
		  background-color:#E8F8F5;
}


</style>
	<body>
	</body>
</html>

<?php
$t_name=@$_POST['topic_name'];
$content=@$_POST['con'];
$date=date("y-m-d");
	if(isset($_POST['submit']))
	{
		if($t_name && $content)
		{
				if(strlen($t_name)>=10 && strlen($t_name)<=70)
				{
						if($query=mysqli_query($connect,"INSERT INTO topics(`topic_id`,`topic_name`,`topic_content`,`topic_creator`,`date`) VALUES ('','".$t_name."','".$content."','".$_SESSION["email"]."','".$date."')"))
						{
							echo "SUCCESS";
						}
						else
						{
							echo "FAILURE";
						}
				}
				else
				{
					echo "TOPIC NAME MUST BE BETWEEN 10 AND 70 CHARACTERS";
				}
		}
		else
		{
			echo "PLEASE FILL IN ALL REQUIRED FIELDS.";
		}
	}



}else
{
	echo "You are not logged in.";
}

?>