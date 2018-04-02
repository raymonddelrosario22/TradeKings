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
		if($value=='create'){
			$url="createLeague.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='join'){
			$url="joinLeague.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='true'){
				$url="leagueMain.php?inputEmail3=" .$testing;
				header('Location: '.$url);
				exit();
		}else if($value=='Overview'){

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
	

<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href = "newNav.css" rel = "stylesheet" type="text/css">

		<title>Bhargav is the best</title> 
	</head>
	
<!--<ul>
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
    <li><a>League</a>
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

<!--<div class="navbar" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">My Portfolio 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Stocks</a>
      <a href="#">Cryptocurrencies</a>
      <a href="#">Transaction History</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Analyze 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Stocks</a>
      <a href="#">Cryptocurrencies</a>
      <a href="#">Popular Trades</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">League 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Overview</a>
      <a href="#">Details</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Forum 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Search</a>
      <a href="#">Create new Thread</a>
    </div>
  </div> 
  <a href="#about">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>-->

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
		
		function createLeague(){
			window.location.assign("?league=create");
			/*console.log("switch to create");*/
		}

		function joinLeague(){
			window.location.assign("?league=join");
			/*console.log("switch to join");*/
		}
	</script>
	
	<body class="bg-dark" style="background-image:url('perhaps.jpg'); background-size:100%;">
		<div style="background-color:#dee0e2;border-radius: 25px;padding-top:2px;padding-bottom:2px;padding-right:0px;padding-left:0px;margin-left:50px;margin-right:50px;margin-top:30px;opacity:0.90">
			<form style="margin-bottom:10px;">
				<div class="row" style="border: 2px dotted black; border-radius: 25px;margin-left:10px;margin-right:10px;margin-top:10px;padding-left:20px;padding-top:20px;padding-bottom:25px;">
					<div class="col-md-3">
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary" onclick="createLeague()">Create League</button>
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary" onclick="joinLeague()">Join a League</button>
					</div>
				</div>
			</form>
		</div>
		<div style="background-color:lightgrey;border-radius: 25px;padding-top:15px;padding-bottom:10px;padding-right:10px;padding-left:10px;margin-left:50px;margin-right:50px;margin-top:30px;opacity:0.95">
			<table class="table thead-dark table-striped table-curved" id="activeLeagues" style="border: 2px dotted black; border-radius: 25px;padding:10px">
				<thead style="background-color: #406cb7; color:white; border-bottom: 2px solid black;">
					<tr>
						<th data-sortable="true">Title</th>
						<th data-sortable="true">Current Value</th>
						<th data-sortable="true">Max Players</th>
						<th data-sortable="true">Current # of Players</th>
					</tr>
				</thead>
				<?php
					$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
					$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

					if ($db->connect_error) {
						die('Connect Error (' . $db->connect_errno . ') '
								. $db->connect_error);
					}
					$results = mysqli_query($db,'SELECT distinct id from containing where email="'.$email.'";');
				?>
				<tbody>
					<?php 
						while ($row = mysqli_fetch_array($results)) { //for every league
							//find out how many players are in each league using the ID
							$query = 'Select * from league where id="'.$row[0].'";';
							$leagueResults = mysqli_query($db,$query);
							while($leagues = $leagueResults->fetch_assoc()){
								$titleU = $leagues['title'];
								$capitalU = $leagues['capital'];
								$size = $leagues['size'];
							}
							$query = 'select count(distinct email) as times from containing where id="'.$row[0].'";';
							$playerResults = mysqli_query($db,$query);
							while($playerResult = $playerResults->fetch_assoc()){
								$playerCount=$playerResult['times'];
							}
					?>	
								<tr>
									<td><?php echo $titleU; ?></td>
									<td><?php echo $capitalU; ?></td>
									<td><?php echo $size; ?></td>
									<td><?php echo $playerCount; ?></td>
								</tr>	
					<?php
						}
					?>
				</tbody>
			</table>	
		</div>
	</body>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</html>







