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
		
		<?php 	$id=$_GET["id"];
		
			

		echo"<form action='reply.php?id=$id' method='POST'>";  ?>

		<center>
			<br> <br> <br> <br><br>
			
			REPLY: <br>
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

$content=@$_POST['con'];
$date=date("y-m-d");
	if(isset($_POST['submit']))
	{
		if( $content)
		{
				
						 if($query=mysqli_query($connect,"INSERT INTO reply(`r_id`,`r_user`,`r_date`,`r_content`,`r_topic_id`) VALUES ('','".$_SESSION["email"]."','".$date."','".$content."','".$id."')"))
						{
							
							echo "SUCCESS"; 
							
						}
						else
						{
							echo "FAILURE";
						}
			header("Location:topic.php?id=$id");	
				
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