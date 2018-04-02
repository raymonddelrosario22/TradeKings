<?php
	session_start();
	
	if(isset($_GET['home'])){
		$url="navBarHome.php";
		header('Location: '.$url);
		exit();	
	}
	
	if(isset($_GET['portfolio'])){
		$value=$_GET['portfolio'];
		if($value=='true'){
			$url="navBarPortfolioStocks.php";
			header('Location: '.$url);
			exit();	
		}else if($value=='stocks'){
			$url="navBarPortfolioStocks.php";
			header('Location: '.$url);
			exit();	
		}else if($value=='crypto'){
			$url="navBarPortfolioCrypto.php";;
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

	<body style="background-image:url('images/backHome.jpg'); background-size:100%;">
		<div class="container">
			<div style="position:fixed;top:150px;left:350px;color:white;font-size:60px">HOME PAGE!</div>
		</div>
		
	</body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>	
	
</html>

