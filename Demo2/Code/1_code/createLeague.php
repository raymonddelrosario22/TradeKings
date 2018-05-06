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

if(isset($_POST['publicityMode'])){
	$title = $_POST['title'];
	$capital = $_POST['capital'];
	$size = $_POST['size'];
	$publicity = $_POST['publicityMode'];
	$mode = $_POST['mode'];
	$leagueID = $email.$title;
	$query = 'insert into league values("'.$leagueID.'","'.$title.'","'.$capital.'","'.$size.'","'.$publicity.'","'.$mode.'","'.$email.'");';
	$confirmation =  mysqli_query($db,$query);
	$query = 'insert into containing values("'.$email.'","'.$leagueID.'");';
	$confirmation =  mysqli_query($db,$query);
	$url="createdLeague.php?inputEmail3=" .$email;
	header('Location: '.$url);
	exit();
}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['email']);
		$url = "newlogin.php";
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
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href = "newNav.css" rel = "stylesheet" type="text/css">
		<iframe
 src="https://widgets.tc2000.com/WidgetServer.ashx?id=100222"
 width="1250" 
 noresize="noresize" 
 scrolling="no" 
 height="16" 
 frameborder="0" 
 ></iframe>
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
</ul>-->

	<!--<script>
		function logout() {
			window.location.assign("login.php");
		}
		
		function home() {
			window.location.assign("home.php");
		}
		
		function league() {
			window.location.assign("leagueMain.php");
		}
		
	</script>-->
	
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
	  <li class="dropdown">
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
	
	<body class="bg-dark" style="background-image:url('perhaps.jpg'); 
		background-size:100%;">
		<div class="container">
			<button type="button" class="btn btn-primary" onclick="back()">Go Back</button>
		</div>
	</body>
	
	<div class="row">

		<form class="form-horizontal" role="form" action="" method="post">
			
			<div class="form-group">
				<label class="col-sm-2 control-label" style="color:white">
					League Title:
				</label>
				<div class="col-sm-5">
					<input type="name" class="form-control" id="title" name="title" required>
				</div>
			</div>
		
			<div class="form-group">
				<label class="col-sm-2 control-label" style="color:white">
					Initial Capital:
				</label>
				<div class="col-sm-5">
					<input type="money_format" class="form-control" id="capital" name="capital" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" style="color:white">
					Select a Mode:
				</label>
				<div class="col-sm-5">
					<select class="form-control" id="mode" name="mode" >
						<option>Normal</option>
						<option>Sector</option>
						<option>Stocks</option>
						<option>Cryptocurrencies</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label" style="color:white">
					League Size:
				</label>
				<div class="col-sm-5">
					<select class="form-control" id="size" name="size" >
						<option>6</option>
						<option>8</option>
						<option>10</option>
						<option>12</option>
						<option>14</option>
						<option>16</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label" style="color:white">
					Publicity:
				</label>
				<div class="btn-group col-sm-5" data-toggle="buttons-radio" style="color:white">
					<label class="radio-inline">
						<input type="radio" name="publicityMode" value="Public" required>
						Public
					</label>
					<label class="radio-inline">
						<input type="radio" name="publicityMode" value="Private" required>
						Private
					</label>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					 
					<button type="submit" class="btn btn-default">
						Create
					</button>
				</div>
			</div>
		</form>
		
	</div>

	<script>
		function back(){
			console.log("creating League...");
			window.location.assign("leagueMain.php");
		}
	</script>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</html>







