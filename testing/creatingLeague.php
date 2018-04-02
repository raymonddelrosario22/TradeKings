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
	$url="creatingLeague.php?inputEmail3=" .$email;
	header('Location: '.$url);
	exit();
}

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

<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href = "newNav.css" rel = "stylesheet" type="text/css">
	</head>
	
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

	<table class="table thead-dark table-striped table-hover-md" id="leaguesTable">
		<thead style="background-color: #406cb7; color:white; border-bottom: 2px solid black;">
			<tr>
				<th data-sortable="true">ID</th>
				<th data-field= "title" data-sortable="true">Title</th>
				<th data-sortable="true">Capital</th>
				<th data-sortable="true">Size</th>
				<th data-sortable="true">Publicity</th>
				<th data-sortable="true">Mode</th>
				<th data-sortable="true">Creator</th>
				<th data-sortable="true"># of Players</th>
			</tr>
		</thead>
		<?php
			$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
			$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

			if ($db->connect_error) {
				die('Connect Error (' . $db->connect_errno . ') '
						. $db->connect_error);
			}
			$results = mysqli_query($db,'SELECT * from league;');
		?>
		<tbody>
			<?php 
				while ($row = mysqli_fetch_array($results)) { 
					//find out how many players are in each league using the ID
					$query = 'select count(distinct email) as times from containing where id="'.$row[0].'";';
					$playerResults = mysqli_query($db,$query);
					while($playerResult = $playerResults->fetch_assoc()){
							$playerCount=$playerResult['times'];
					} ?>
					<tr>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[5]; ?></td>
						<td><?php echo $row[6]; ?></td>
						<td><?php echo $playerCount; ?></td>
					</tr>; <?php
				}
			?>
		</tbody>
	</table>
	
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







