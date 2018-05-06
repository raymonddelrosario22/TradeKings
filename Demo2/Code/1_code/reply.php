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
		  background-image:url('perhaps.jpg'); background-size:100%;
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