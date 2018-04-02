<?php
	session_start();
	$email = $_SESSION['email'];
	//echo '<p> '.$testing.' </p>';

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['email']);
		$url = "login.php";
		header('Location: '.$url);
	}
	
	if(isset($_GET['home'])){
		$url="home.php?inputEmail3=" .$email;
		header('Location: '.$url);
		exit();	
	}
	
	if(isset($_GET['portfolio'])){
		$value=$_GET['portfolio'];
		if($value=='true'){
			
		}else if($value=='stocks'){

		}else if($value=='crypto'){
				
		}else if($value=='trades'){

		}
	}
	
	if(isset($_GET['analyze'])){
		$value=$_GET['analyze'];
		if($value=='true'){
			$url="researchStock.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='stocks'){
			$url="researchStock.php?inputEmail3=" .$email;
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
?>

<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trade Kings</title>
</head>

<link href="css/bootstrap.min.css" rel="stylesheet">	
<link href = "newNav.css" rel = "stylesheet" type="text/css">

<!--<ul>
    <li><a href="?home=true">Home</a></li>
    <li><a href="?portfolio=true">My Portfolio</a>
		<ul>
			<li><a href="?portfolio=stocks">Stocks</a></li>
			<li><a href="?portfolio=crypto">Cryptocurrencies</a></li>
			<li><a href="?portfolio=history">Transaction History</a></li>
		</ul>
    </li>
    <li><a href="?analyze=true">Analyze</a>
		<ul>
			<li><a href="?analyze=stocks">Stocks</a></li>
			<li><a href="?analyze=crypto">Cryptocurrencies</a></li>
			<li><a href="?analyze=trades">Popular Trades</a></li>
		</ul>
	</li>
    <li><a href="?league=true">League</a>
		<ul>
			<li><a href="?league=Overview">Overview</a></li>
			<li><a href="?league=Details">Details</a></li>
		</ul>
	</li>
    <li><a href="?forum=true">Forum</a>
		<ul>
			<li><a href="?forum=search">Search</a></li>
			<li><a href="?forum=create">Create new Thread</a></li>
		</ul>
	</li>
	<li><a href="?logout=true">Logout</a></li>
</ul>-->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="?home=true">Home</a></li>
      <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="?portfolio=true">My Portfolio
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?portfolio=stocks">Stocks</a></li>
				<li><a href="?portfolio=crypto">Cryptocurrencies</a></li>
				<li><a href="?portfolio=history">Transaction History</a></li>
			</ul>
      </li>
	  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="?analyze=true">Analyze
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?analyze=stocks">Stocks</a></li>
				<li><a href="?analyze=crypto">Cryptocurrencies</a></li>
				<li><a href="?analyze=trades">Popular Trades</a></li>
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
	  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown"  href="?forum=true">Forum
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?forum=search">Search</a></li>
				<li><a href="?forum=create">Create new Thread</a></li>
			</ul>
      </li>
	  <li class=""><a href="?education=true">Educational Content</a></li>
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

<!--	<script>	
		function home() {
			window.location.assign("home.php");
		}
		
		function league() {
			window.location.assign("leagueMain.php");
		}
		
	</script>
-->	
	<body style="background-image:url('images/backHome.jpg'); background-size:100%;">
		<div class="container">
			<div style="position:fixed;top:150px;left:350px;color:white;font-size:60px">Welcome to Trade Kings!</div>
		</div>
	</body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>	
	
</html>

