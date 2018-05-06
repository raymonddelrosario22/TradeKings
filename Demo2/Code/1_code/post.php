<?php

session_start();

require('connect.php');
	if(isset($_GET['home'])){
		$url="home.php?inputEmail3=" .$email;
		header('Location: '.$url);
		exit();	
	}
	
	if(isset($_GET['portfolio'])){
		$value=$_GET['portfolio'];
		if($value=='true'){
			$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='stocks'){
			$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='crypto'){
				$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='trades'){
			$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}
	}
	
	if(isset($_GET['analyze'])){
		$value=$_GET['analyze'];
		if($value=='true'){
			$url="ResearchStock_2.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='stocks'){
			$url="ResearchStock_2.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='crypto'){
			$url="crypto.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='trades'){

		}
	}
	
	if(isset($_GET['league'])){
			$value=$_GET['league'];
			if($value=='true'){
				$url="leagueMain.php?inputEmail3=" .$testing;
				header('Location: '.$url);
				exit();
			}else if($value=='Overview'){
				$url="leagueMain.php?inputEmail3=" .$testing;
				header('Location: '.$url);
				exit();
			}else if($value=='Details'){

			}
	}
	
	if(isset($_GET['forum'])){
		$value=$_GET['forum'];
		if($value=='true'){
			$url="index.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}else if($value=='search'){
			$url="index.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}else if($value=='create'){
			$url="index.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}
	}	

	if(isset($_GET['education'])){
		$value=$_GET['education'];
		if($value=='true'){
			$url="education.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}
	}

	if(isset($_GET['trade'])){
		$value=$_GET['trade'];
		if($value=='true'){
			$url="tradeStocks.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}else if($value=='stocks'){
			$url="tradeStocks.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}else if($value=='crypto'){
			$url="tradeCrypto.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}
	}
	
	if(isset($_GET['news'])){
		$value=$_GET['news'];
		if($value=='true'){
			$url="news.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}
	}
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
		  background-image:url('perhaps.jpg'); background-size:100%;
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