<?php
$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}
	session_start();
	$email = $_SESSION['email'];
	//echo '<p> '.$testing.' </p>';

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

	if(isset($_GET['join']) && isset($_GET['type'])){
		$value=$_GET['join'];
		$type=$_GET['type'];
		if($type=="Public"){
			//echo '<p> You just joined a league. Congratulations!! '.$email.'</p>';
			$query = 'insert into containing values("'.$email.'","'.$value.'");';
			$confirmation =  mysqli_query($db,$query);
			//echo '<p> You just joined a league. Congratulations!! </p>';
			$url="joinLeague.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else{
			//WRITE CODE TO REQUEST INVITATION
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
<body style="background-image:url('perhaps.jpg'); background-size:100%;">

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
<!--	<script>
		function logout() {
			window.location.assign("testmysql.php");
		}
		
		function home() {
			window.location.assign("index.html");
		}
		
		function league() {
			window.location.assign("leagueMain.php");
		}
		
	</script>-->
	
	<body class="bg-dark">
		<div class="container">
			<button type="button" class="btn btn-primary" onclick="joinLeague()">Go Back</button>
		</div>
	</body>
	
		<table class="table thead-dark table-striped table-hover-md" id="leaguesTable">
		<thead style="background-color: #406cb7; color:white; border-bottom: 2px solid black;">
			<tr>
				<th data-field= "title" data-sortable="true">Title</th>
				<th data-sortable="true">Capital</th>
				<th data-sortable="true">Size</th>
				<th data-sortable="true">Publicity</th>
				<th data-sortable="true">Mode</th>
				<th data-sortable="true">Creator</th>
				<th data-sortable="true"># of Players</th>
				<th data-sortable="true">Join League</th>
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
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[5]; ?></td>
						<td><?php echo $row[6]; ?></td>
						<td><?php echo $playerCount; ?></td>
						<td><a href="?join=<?php echo $row[0]; ?>&type=<?php echo $row[4]; ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="align:center"><?php if($row[4]=="Private"){echo 'Request Invite';}else{echo 'Join';} ?></button></a></td>
					</tr>; <?php
				}
			?>
		</tbody>
	</table>
</body>	
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
        <p>Congratulations! You just joined a new leage.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()">Close</button>
      </div>
    </div>
  </div>
</div>
	
	<script>
		function joinLeague(){
			console.log("joining League...");
			window.location.assign("leagueMain.php");
		}
		function refresh(){
			window.location.assign("joinLeague.php");
		}
	</script>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</html>