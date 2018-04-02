<?php
session_start();
	
if(!isset($_SESSION['email'])){
	header("Location: login.php");
	exit();
}

$email=$_SESSION['email'];

$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}

if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['email']);
		$url = "login.php";
		header('Location: '.$url);
		exit();
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
			
		}else if($value=='stocks'){
			
		}else if($value=='crypto'){
		
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
			
		}else if($value=='search'){
			
		}else if($value=='create'){
				
		}
	}
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href = "newNav.css" rel = "stylesheet" type="text/css">
	</head>
	
<!--	<ul>
    <li><a onclick="home()">Home</a></li>
    <li><a>My Portfolio</a>
		<ul>
			<li><a>Stocks</a></li>
			<li><a>Cryptocurrencies</a></li>
			<li><a>Transaction History</a></li>
		</ul>
    </li>
    <li><a>Analyze</a>
		<ul>
			<li><a>Stocks</a></li>
			<li><a>Cryptocurrencies</a></li>
			<li><a>Popular Trades</a></li>
		</ul>
	</li>
    <li><a onclick="league()">League</a>
		<ul>
			<li><a>Overview</a></li>
			<li><a>Details</a></li>
		</ul>
	</li>
    <li><a>Forum</a>
		<ul>
			<li><a>Search</a></li>
			<li><a>Create new Thread</a></li>
		</ul>
	</li>
    <li><a onclick="logout()">Logout</a></li>
</ul>

	<script>
		function logout() {
			window.location.assign("testmysql.php");
		}
		
		function home() {
			window.location.assign("index.html");
		}
		
		function league() {
			window.location.assign("leagueMain.php");
		}
		
	</script>
-->
	
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="?home=true">Home</a></li>
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
	  <li class="dropdown active">
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
	
	<body class="bg-dark">
		<div class="container">
			<div class="alert alert-info" role="alert" id="createdMsg">
				<strong>Congratulations!</strong> You successfully created a new League.
			</div>
			<form>
				<div class="row">
				</div>
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary" onclick="createLeague()">Create another League</button>
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary" onclick="">Invite Players</button>
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary" onclick="back()">Go Back</button>
					</div>
				</div>
			</form>
		</div>
	</body>
	

	<script>
		function back(){
			window.location.assign("leagueMain.php");
		}
		function createLeague(){
			window.location.assign("createLeague.php");
		}
	</script>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</html>

<?php

?>




