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

<style>
h1{
	font-size:300%;
}

</style>
<head>
	<title>Home Page</title>
			<iframe
 src="https://widgets.tc2000.com/WidgetServer.ashx?id=100222"
 width="1250" 
 noresize="noresize" 
 scrolling="no" 
 height="16" 
 frameborder="0" 
 ></iframe>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">	
<link href = "newNav.css" rel = "stylesheet" type="text/css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class=""><a href="?home=true">Home</a></li>
      <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="?portfolio=true">My Portfolio
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?portfolio=stocks">Stocks</a></li>
				<li><a href="?portfolio=crypto">Cryptocurrencies</a></li>
			</ul>
      </li>
	  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="?analyze=true">Analyze
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?analyze=stocks">Stocks</a></li>
				<li><a href="?analyze=crypto">Cryptocurrencies</a></li>
			</ul>
      </li>
	  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="?trade=true">Execute Trade
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?trade=stocks">Stocks</a></li>
				<li><a href="?trade=crypto">Cryptocurrencies</a></li>
			</ul>
      </li>
	  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown"  href="?league=true">League
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?league=Overview">Overview</a></li>
				<li><a href="?league=Details">Details</a></li>
			</ul>
      </li>
	  <li class="dropdown active">
			<a class="dropdown-toggle" data-toggle="dropdown"  href="?forum=true">Forum
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?forum=search">Search</a></li>
				<li><a href="?forum=create">Create new Thread</a></li>
			</ul>
      </li>
	  <li class=""><a href="?education=true">Educational Content</a></li>
	  <li class=""><a href="?news=true">Daily Markets Update</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
	</script>
	<?php include("header.php"); ?>
<body style="background-image:url('perhaps.jpg'); background-size:100%;">
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
</body>
	<style>



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