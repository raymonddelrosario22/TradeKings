<?php
	session_start();
	$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}
	$email = $_SESSION['email'];
	//echo '<p> '.$testing.' </p>';
$connect=$db;
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
		$type=@$_POST['bos'];

	$price=@$_POST['target'];
	$tick=@$_POST['ticker'];

	$price2=@$_POST['target2'];
	$tick2=@$_POST['ticker2'];

	$price3=@$_POST['target3'];
	$tick3=@$_POST['ticker3'];

	if(isset($_POST['submit']))
	{
		if( ($price && $tick) || ($price2 && $tick2) || ($price3 && $tick3))
		{				
					
			if($query=mysqli_query($connect,"INSERT INTO crypto(`email`,`ticker`,`target`,`id`,`stock`,`stockPrice`,`stockPE`,`PE`,`type`) VALUES ('".$_SESSION["email"]."','".$tick."','".$price."','','".$tick2."','".$price2."','".$tick3."','".$price3."','".$type."')"))
			{			
				//echo "<br> SUCCESS"; 			
			}
			else
			{
				//echo "<br> FAILURE";
			}
		}
		else
		{
			echo "PLEASE FILL IN ALL REQUIRED FIELDS.";
		}
	}
		//
	else
	{
		//echo "You are not logged in.";
	}
?>
<?php

if(isset($_POST['submit']))		//
	
		?>

<center>
		<?php $count=0;
	$check=mysqli_query($db,"SELECT * FROM crypto ");
	$rows=mysqli_num_rows($check);
	while($row=mysqli_fetch_assoc($check))
	{  
		$tick2[$count]=$row['ticker'];
		$price2[$count]=$row['target'];

		$tick3[$count]=$row['stock'];
		$price3[$count]=$row['stockPrice'];

		$tick5[$count]=$row['stockPE'];
		$price5[$count]=$row['PE'];

		$marker[$count]=$row['Mark'];
		$marker2[$count]=$row['Mark2'];
		$marker3[$count]=$row['Mark3'];
		$type[$count]=$row['type'];

		$email[$count]=$row['email'];

			$id[$count]=$row['id'];

		$count=$count+1;
	}

		?>
</center>

<!doctype html>
<html lang = "en" >
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset = "utf-8" >
<meta name = "viewport" content= "width=device-width, initial-scale=1" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>

	body{
		background-color: lightgray;
		margin: 15px;
	}

	p{
		font-size: 12px;
	}

	a{
		font-size: 12px;
		font-family: verdana;
		font-weight: lighter;
	}

	.heading{
		font-weight: bold;
	}

	#loader {
		display: none;
  		position: absolute;
  		left: 50%;
  		top: 50%;
  		z-index: 1;
  		width: 150px;
  		height: 150px;
  		margin: -75px 0 0 -75px;
  		border: 16px solid #f3f3f3;
  		border-radius: 50%;
  		border-top: 16px solid #3498db;
  		width: 120px;
  		height: 120px;
  		-webkit-animation: spin 2s linear infinite;
  		animation: spin 2s linear infinite;
	}

	@-webkit-keyframes spin {
  		0% { -webkit-transform: rotate(0deg); }
  		100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
  		0% { transform: rotate(0deg); }
  		100% { transform: rotate(360deg); }
	}

	form.example input[type=text] {
 		padding: 10px;
  		font-size: 14px;
  		border: 1px solid grey;
  		float: left;
  		width: 25%;
  		background: #f1f1f1;	   
	}

	/* Style the submit button */
	form.example button {
		float: left;
		width: 5%;
		padding: 10px;
		background: #2196F3;
		color: white;
		font-size: 14px;
		border: 1px solid grey;
		border-left: none; /* Prevent double borders */
		cursor: pointer;  
	}

	form.example button:hover {
		background: #0b7dda;
	}

	form.example::after {
  		content: "";
  		clear: both;
  		display: table;
	}

	#stockName{
		font-family: verdana;
		font-weight: bold;
		font-size: 24px;
		grid-area: stockName;
		background: #ADD8E6;
	}
	#currentPrice {
		font-family: verdana;
		font-weight: bold;
		font-size: 20px;
		grid-area: currentPrice;
	}

	#priceChange{
		font-family: verdana;
		font-weight: normal;
		font-size: 20px;
		float: left;
		grid-area: priceChange;
	}

	#currentPriceTime{
		color: gray;
		font-family: verdana;
		font-weight: lighter;
		font-size: 14px;
		grid-area: currentPriceTime;
	}

	#exchange_ticker{
		color: gray;
		font-family: verdana;
		font-weight: lighter;
		font-size: 14px;
		grid-area: exchange_ticker;
	}

	#logo{
		grid-area: logo;
		align-self: center;
		display: none;
	}

	.triangle-up {
		display: none;
		width: 0;
		height: 0;
		border-left: 5px solid transparent;
		border-right: 5px solid transparent;
		border-bottom: 10px solid #008000;
		grid-area: triangle-up;
		float: left;
	}

	#change{
		grid-area: change;
	}

	#description{
		font-size: 25%;
		grid-area: description;
	}

	#sector{
		grid-area: description;
	}

	.info{
		background-color: white;
		padding-left: 5px;
		grid-area: basic;
		display: none;
		grid-template-columns: 1fr 1fr;
		grid-template-areas: 
		"stockName stockName"
		"exchange_ticker currentPriceTime"
		"currentPrice change";
	}

	.mainpanel{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		grid-template-columns: 0.5fr 0.5fr 0.5fr;
		grid-template-areas: 
		"basic basic logo"
		"graphs graphs graphs"
		"graphs graphs graphs"
		"graphs graphs graphs"
		"finance finance finance"
		"news news news";
		grid-area: mainpanel;
		display: none;	
	}

	.general{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		grid-area: general;
		display: none;	
	}

	.relatedNews{
		background-color: white;
		padding: 5px;
		grid-area: news;	
		display: none;			
	}

	.research{
		grid-area: research;
	}

	.graphs{
		background-color: white; 
		height: 500px;
		grid-area: graphs;
		display: none;
	}

	.tablink {
		background-color: #555;
    	color: white;
    	float: left;
    	border: none;
   		outline: none;
    	cursor: pointer;
    	padding: 10px 12px;
    	font-size: 14px;
    	width: 12.5%;
	}

	.tablink:hover {
    	background-color: #777;
	}

	/* Style the tab content */
	.tabcontent {
    	display: none;
	}
	.analytics{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		grid-area: analytics;
		display: none;
	}

	.finance{
		background-color: white;
		padding: 5px;
		grid-area: finance;	
		display: none;	
	}

	.peers{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		grid-area: peers;		
		display: none;
	}

	.alert{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		grid-area: alert;		
		display: none;
	}

	.header {
		color: white;
		background: #9B2335;
		text-align: center;
		border: 1px solid #B0C4DE;
		border-bottom: none;
		border-radius: 10px 10px 0px 0px;
		padding: 20px;
	}
	#kishan{
		grid-area: forecast;
		display: none;
	}
	
	#search {
    	width: 16em;  height: 2em;
	}

	.dataTitle{
		font-family: verdana;
		font-weight: lighter;
		font-size: 20px;
		background: #ADD8E6;
	}

	/*.grid{
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-template-areas: 
		"research research"
		"mainpanel mainpanel"
		"mainpanel mainpanel"
		"mainpanel mainpanel"
		"general general"
		"analytics analytics";
		grid-column-gap: 20px;
		grid-row-gap: 20px;
	}*/

	/*Design grid styling for overall page */
	.grid{
		display: grid;
		grid-template-columns: 1fr 0.5fr 1fr;
		grid-template-areas: 
		"research research forecast "
		"mainpanel mainpanel general"
		"mainpanel mainpanel general"
		"mainpanel mainpanel analytics"
		"mainpanel mainpanel peers"
		"mainpanel mainpanel alert";
		grid-column-gap: 20px;
		grid-row-gap: 20px;
	}	



</style>

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
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
	  <li class="dropdown active">
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

	
	<div id="loader"></div>

	<div class="grid">
		<div class="research">
			<form class="example" onsubmit="myFunction();return false">
				<input type="text" id="myInput" name="search" placeholder="Search Stocks by Ticker..">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<div id="tensorflow">
	
			<button id="kishan">Show Prediction</button>

		</div>
		
		<div id="main" class="mainpanel">
			<div id="information" class="info">
				<p id="stockName"></p>
				<p id="exchange_ticker"></p>
				<p id="currentPriceTime"></p>
				<p id="currentPrice"></p>
				<div id="change">
					<p id="priceChange"></p>
					<div id="triangleup" class="triangle-up"></div>
				</div>
			</div>
			<hr>
			<img id="logo"></img>
			<hr>
			<div id="graph" class="graphs">
				<div id="1d" class="tabcontent"></div>
				<div id="1m" class="tabcontent"></div>
				<div id="3m" class="tabcontent"></div>
				<div id="6m" class="tabcontent"></div>
				<div id="Ytd" class="tabcontent"></div>
				<div id="1y" class="tabcontent"></div>
				<div id="2y" class="tabcontent"></div>
				<div id="5y" class="tabcontent"></div>

				<button class="tablink" onclick="show('1d')" id="defaultOpen">1d</button>
				<button class="tablink" onclick="show('1m')">1m</button>
				<button class="tablink" onclick="show('3m')">3m</button>
				<button class="tablink" onclick="show('6m')">6m</button>
				<button class="tablink" onclick="show('Ytd')">Ytd</button>
				<button class="tablink" onclick="show('1y')">1y</button>
				<button class="tablink" onclick="show('2y')">2y</button>
				<button class="tablink" onclick="show('5y')">5y</button>
			</div>
		
			<div id="financials" class="finance">
				<div class="row">
					<div id="financerow1col1" class="col-md-12">
						<p id="financetitle" class="dataTitle">Financials</p>
						<hr>
					</div>
				</div>
				<div class="row">
					<div id="financerow2col1" class="col-md-3">
						<p class="heading">Revenue</p>
					</div>
					<div id="financerow2col2" class="col-md-3">
						<p id="revenue"></p>
					</div>
					<div id="financerow2col3" class="col-md-3">
						<p class="heading">Operating Income</p>
					</div>
					<div id="financerow2col4" class="col-md-3">
						<p id="opincome"></p>
					</div>
				</div>
				<div class="row">
					<div id="financerow3col1" class="col-md-3">
						<p class="heading">Net Income</p>
					</div>
					<div id="financerow3col2" class="col-md-3">
						<p id="netincome"></p>
					</div>
					<div id="financerow3col3" class="col-md-3">
						<p class="heading">Cash</p>
					</div>
					<div id="financerow3col4" class="col-md-3">
						<p id="cash"></p>
					</div>
				</div>
				<div class="row">
					<div id="financerow4col1" class="col-md-3">
						<p class="heading">EPS</p>
					</div>
					<div id="financerow4col2" class="col-md-3">
						<p id="eps"></p>
					</div>
					<div id="financerow4col3" class="col-md-3">
						<p class="heading">Debt</p>
					</div>
					<div id="financerow4col4" class="col-md-3">
						<p id="debt"></p>
					</div>
				</div>
				<div class="row">
					<div id="financerow5col1" class="col-md-3">
						<p class="heading">EBITDA</p>
					</div>
					<div id="financerow5col2" class="col-md-3">
						<p id="ebitda"></p>
					</div>
					<div id="financerow5col3" class="col-md-3">
						<p class="heading">Shareholder's Equity</p>
					</div>
					<div id="financerow5col4" class="col-md-3">
						<p id="shequity"></p>
					</div>
				</div>
				<div class="row">
					<div id="financerow6col1" class="col-md-3">
						<p class="heading">Cash Flow</p>
					</div>
					<div id="financerow6col2" class="col-md-3">
						<p id="cashflow"></p>
					</div>
					<div id="financerow6col3" class="col-md-3">
						<p class="heading">Total Assets</p>
					</div>
					<div id="financerow6col4" class="col-md-3">
						<p id="totassets"></p>
					</div>
				</div>
				<div class="row">
					<div id="financerow7col1" class="col-md-3">
						<p class="heading">Total Liabilities</p>
					</div>
					<div id="financerow7col2" class="col-md-3">
						<p id="totliabilities"></p>
					</div>
					<div id="financerow7col3" class="col-md-3">
						<p class="heading">Gross Profit</p>
					</div>
					<div id="financerow7col4" class="col-md-3">
						<p id="grossprofit"></p>
					</div>
				</div>
			</div>

			<div id="news" class="relatedNews">
				<div class="row">
					<div id="newsrow1col1" class="col-md-12">
						<p id="newstitle" class="dataTitle">Related News</p>
						<hr>
					</div>
				</div>
				<div class="row">
					<div id="newsrow2col1" class="col-md-12">
						<a id="news1"></a>
					</div>
				</div>
				<div class="row">
					<div id="newsrow3col1" class="col-md-12">
						<a id="news2"></a>
					</div>
				</div>
				<div class="row">
					<div id="newsrow4col1" class="col-md-12">
						<a id="news3"></a>
					</div>
				</div>
				<div class="row">
					<div id="newsrow5col1" class="col-md-12">
						<a id="news4"></a>
					</div>
				</div>
				<div class="row">
					<div id="newsrow6col1" class="col-md-12">
						<a id="news5"></a>
					</div>
				</div>
			</div>

		</div>

		<div id="genInfo" class="general">
				<div class="row">
					<div id="geninforow1col1" class="col-md-12">
						<p id="geninfotitle" class="dataTitle">General Information</p>
						<hr>
					</div>
				</div>
				<div class="row">
					<div id="geninforow2col1" class="col-md-6">
						<p class="heading">Sector</p>
					</div>
					<div id="geninforow2col2" class="col-md-6">
						<p id="sector"></p>
					</div>
				</div>
				<div class="row">
					<div id="geninforow3col1" class="col-md-6">
						<p class="heading">Industry</p>
					</div>
					<div id="geninforow3col2" class="col-md-6">
						<p id="industry"></p>
					</div>
				</div>
				<div class="row">
					<div id="geninforow4col1" class="col-md-6">
						<p class="heading">CEO</p>
					</div>
					<div id="geninforow4col2" class="col-md-6">
						<p id="ceo"></p>
					</div>
				</div>
				<div class="row">
					<div id="geninforow5col1" class="col-md-6">
						<p class="heading">Website</p>
					</div>
					<div id="geninforow5col2" class="col-md-6">
						<a id="website"></a>
					</div>
				</div>
				<div class="row">
					<div id="geninforow6col1" class="col-md-6">
						<p class="heading">Company Description</p>
					</div>
					<div id="geninforow6col2" class="col-md-6">
						<p id="description"></p>
					</div>
				</div>
			</div>


		<div id="keystats" class="analytics">
			<div class="row">
				<div id="overviewrow1col1" class="col-md-12">
					<p id="overviewtitle" class="dataTitle">Overview</p>
					<hr>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow2col1" class="col-md-6">
					<p class="heading">Open</p>
				</div>
				<div id="overviewrow2col2" class="col-md-6">
					<p id="open"></p>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow3col1" class="col-md-6">
					<p class="heading">High</p>
				</div>
				<div id="overviewrow3col2" class="col-md-6">
					<p id="high"></p>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow4col1" class="col-md-6">
					<p class="heading">Low</p>
				</div>
				<div id="overviewrow4col2" class="col-md-6">
					<p id="low"></p>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow5col1" class="col-md-6">
					<p class="heading">Prev. Close</p>
				</div>
				<div id="overviewrow5col2" class="col-md-6">
					<p id="prevclose"></p>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow6col1" class="col-md-6">
					<p class="heading">Mkt Cap</p>
				</div>
				<div id="overviewrow6col2" class="col-md-6">
					<p id="mktcap"></p>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow7col1" class="col-md-6">
					<p class="heading">P/E Ratio</p>
				</div>
				<div id="overviewrow7col2" class="col-md-6">
					<p id="peratio"></p>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow8col1" class="col-md-6">
					<p class="heading">Dividend Yield</p>
				</div>
				<div id="overviewrow8col2" class="col-md-6">
					<p id="divyield"></p>
				</div>
			</div>
			<div class="row">
				<div id="overviewrow9col1" class="col-md-6">
					<p class="heading">Beta</p>
				</div>
				<div id="overviewrow9col2" class="col-md-6">
					<p id="beta"></p>
				</div>
			</div>
		</div>

		<div id="alsosearched" class="peers">
			<div class="row">
				<div id="alsosearchedrow1col1" class="col-md-12">
					<p id="alsosearchedtitle" class="dataTitle">Similar Equities</p>
					<hr>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow2col1" class="col-md-12">
					<p id="peer1" onclick="newSearch(this)"></p>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow3col1" class="col-md-12">
					<p id="peer2" onclick="newSearch(this)"></p>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow4col1" class="col-md-12">
					<p id="peer3" onclick="newSearch(this)"></p>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow5col1" class="col-md-12">
					<p id="peer4" onclick="newSearch(this)"></p>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow6col1" class="col-md-12">
					<p id="peer5" onclick="newSearch(this)"></p>
				</div>
			</div>
		</div>
<div id="stockAlert" class="alert">
		<CENTER>
	 <div>
	  <p  class="dataTitle">Set Alerts</p>
	  <hr>
  </div>
	<form action="ResearchStock_2.php" method="POST">
	
	   
	<div>    

<b>BUY: <input type="radio" name="bos" value="buy" checked="checked">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

SELL: <input type="radio" name="bos" value="sell" > <br><br></b>

		<b> <input type="hidden" name="target" value="0">

  
  	   <input type="hidden" name="ticker" value="NULL">
  

       &nbsp; STOCK TARGET:	 <input type="number" name="target2" value="0">
		<br>   <br>
  
  	   &nbsp; STOCK TICKER:	 <input type="text" name="ticker2" value="NULL">
        <br>  <br>

      &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;  P/E TARGET: 	<input type="number" name="target3" value="0">
		<br>   <br>
  
  	   &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; P/E TICKER:	 <input type="text" name="ticker3" value="NULL">
        <br>  <br> </b> 

    </div>
		
		<input type="submit" name="submit" value="Set"> or <a href="ResearchStock_2.php">CHECK PAGE </a>
	</form>
</CENTER>

			<form action="ResearchStock_2.php" method="POST">

		
				<center>  
				<input type="submit" id="search" name="submit" value="CHECK"> or <a href="ResearchStock_2.php">SET PAGE </a>
				</center>
			</form>
		</div>	

	</div>

<script>
	var plottingResult=[];
	var ytd2=[];
	console.log(plottingResult)
	$(document).ready(function(){
		$("#kishan").click(function(){
			 async: false,
			$.post("http://localhost:5000/model",
			{
			  data1: JSON.stringify(ytd2)
			},
			function(data,status){
				var predictResult = JSON.parse(data)
				plottingResult.push(predictResult)
				//alert("Data: " + predictResult + "\nStatus: " + status);
				alert(status +": Forecast has been added to Ytd graph");
				hello()
			});
		});
	});
	function hello(){
		console.log(plottingResult)
		forecastResult(plottingResult)
	}
	var filter;
	function myFunction(){
    	document.getElementById("loader").style.display = "block";
    	mySearch();
	}

	function mySearch(){

		var input;
    	input = document.getElementById('myInput');

    	/*const urlStockList = 'https://api.iextrading.com/1.0/ref-data/symbols';
    	const xhrSL = new XMLHttpRequest();
		xhrSL.open( 'GET', urlStockList, true );
		xhrSL.onerror = function( xhrSL ) { console.log( 'error:', xhrSL  ); };
		xhrSL.onprogress = function( xhrSL ) { console.log( 'bytes loaded:', xhrSL.loaded  ); }; /// or something

		let response, json;
		response = xhrSL.target.response;
		json = JSON.parse( response );

		symbols = [];
		names = [];
		for(x in json){
			symbols.push(x["symbol"]);
			names.push(x["name"]);
		}*/


    	filter = input.value.toLowerCase();

    	const urlCompanyName = 'https://api.iextrading.com/1.0/stock/'+ filter +'/company';
    	const urlPrice = 'https://api.iextrading.com/1.0/stock/'+ filter +'/price';
    	const url5y = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/5y';
    	const url2y = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/2y';
    	const url1y = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/1y';
    	const urlYtd = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/ytd';
    	const url6m = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/6m';
    	const url3m = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/3m';
    	const url1m = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/1m';
    	const url1d = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/1d';
    	const urlValChange = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/1d';
    	const urlLogo = 'https://api.iextrading.com/1.0/stock/'+ filter +'/logo';
    	const urlStats = 'https://api.iextrading.com/1.0/stock/'+ filter +'/stats';
    	const urlMoreStats = 'https://api.iextrading.com/1.0/stock/'+ filter +'/quote';
    	const urlFinancials = 'https://api.iextrading.com/1.0/stock/'+ filter +'/financials';
    	const urlPeers = 'https://api.iextrading.com/1.0/stock/'+ filter +'/peers';
    	const urlNews = 'https://api.iextrading.com/1.0/stock/'+ filter +'/news';

    	requestFile(urlCompanyName,urlPrice,url5y,url2y,url1y,urlYtd,url6m,url3m,url1m,url1d,urlValChange,urlLogo,urlStats,urlMoreStats,urlFinancials,urlPeers,urlNews);
	}

	function requestFile(urlCompanyName, urlPrice, url5y, url2y, url1y, urlYtd, url6m, url3m, url1m, url1d, urlValChange, urlLogo, urlStats, urlMoreStats, urlFinancials, urlPeers, urlNews) {

		const xhrCN = new XMLHttpRequest();
		xhrCN.open( 'GET', urlCompanyName, true );
		xhrCN.onerror = function( xhrCN ) { console.log( 'error:', xhrCN  ); };
		xhrCN.onprogress = function( xhrCN ) { console.log( 'bytes loaded:', xhrCN.loaded  ); }; /// or something
		xhrCN.onload = getName;
		xhrCN.send( null );

		const xhrL = new XMLHttpRequest();
		xhrL.open( 'GET', urlLogo, true );
		xhrL.onerror = function( xhrL ) { console.log( 'error:', xhrL  ); };
		xhrL.onprogress = function( xhrL ) { console.log( 'bytes loaded:', xhrL.loaded  ); }; /// or something
		xhrL.onload = getLogo;
		xhrL.send( null );

		const xhrP = new XMLHttpRequest();
		xhrP.open( 'GET', urlPrice, true );
		xhrP.onerror = function( xhrP ) { console.log( 'error:', xhrP  ); };
		xhrP.onprogress = function( xhrP ) { console.log( 'bytes loaded:', xhrP.loaded  ); }; /// or something
		xhrP.onload = getPrice;
		xhrP.send( null );

		const xhr5y = new XMLHttpRequest();
		xhr5y.open( 'GET', url5y, true );
		xhr5y.onerror = function( xhr5y ) { console.log( 'error:', xhr5y  ); };
		xhr5y.onprogress = function( xhr5y ) { console.log( 'bytes loaded:', xhr5y.loaded  ); }; /// or something
		xhr5y.onload = get5y;
		xhr5y.send( null );

		const xhr2y = new XMLHttpRequest();
		xhr2y.open( 'GET', url2y, true );
		xhr2y.onerror = function( xhr2y ) { console.log( 'error:', xhr2y  ); };
		xhr2y.onprogress = function( xhr2y ) { console.log( 'bytes loaded:', xhr2y.loaded  ); }; /// or something
		xhr2y.onload = get2y;
		xhr2y.send( null );

		const xhr1y = new XMLHttpRequest();
		xhr1y.open( 'GET', url1y, true );
		xhr1y.onerror = function( xhr1y ) { console.log( 'error:', xhr1y  ); };
		xhr1y.onprogress = function( xhr1y ) { console.log( 'bytes loaded:', xhr1y.loaded  ); }; /// or something
		xhr1y.onload = get1y;
		xhr1y.send( null );

		const xhrY = new XMLHttpRequest();
		xhrY.open( 'GET', urlYtd, true );
		xhrY.onerror = function( xhrY ) { console.log( 'error:', xhrY  ); };
		xhrY.onprogress = function( xhrY ) { console.log( 'bytes loaded:', xhrY.loaded  ); }; /// or something
		xhrY.onload = getYtd;
		xhrY.send( null );

		const xhr6m = new XMLHttpRequest();
		xhr6m.open( 'GET', url6m, true );
		xhr6m.onerror = function( xhr6m ) { console.log( 'error:', xhr6m  ); };
		xhr6m.onprogress = function( xhr6m ) { console.log( 'bytes loaded:', xhr6m.loaded  ); }; /// or something
		xhr6m.onload = get6m;
		xhr6m.send( null );

		const xhr3m = new XMLHttpRequest();
		xhr3m.open( 'GET', url3m, true );
		xhr3m.onerror = function( xhr3m ) { console.log( 'error:', xhr3m  ); };
		xhr3m.onprogress = function( xhr3m ) { console.log( 'bytes loaded:', xhr3m.loaded  ); }; /// or something
		xhr3m.onload = get3m;
		xhr3m.send( null );

		const xhr1m = new XMLHttpRequest();
		xhr1m.open( 'GET', url1m, true );
		xhr1m.onerror = function( xhr1m ) { console.log( 'error:', xhr1m  ); };
		xhr1m.onprogress = function( xhr1m ) { console.log( 'bytes loaded:', xhr1m.loaded  ); }; /// or something
		xhr1m.onload = get1m;
		xhr1m.send( null );

		const xhr1d = new XMLHttpRequest();
		xhr1d.open( 'GET', url1d, true );
		xhr1d.onerror = function( xhr1d ) { console.log( 'error:', xhr1d  ); };
		xhr1d.onprogress = function( xhr1d ) { console.log( 'bytes loaded:', xhr1d.loaded  ); }; /// or something
		xhr1d.onload = get1d;
		xhr1d.send( null );

		const xhrVC = new XMLHttpRequest();
		xhrVC.open( 'GET', urlValChange, true );
		xhrVC.onerror = function( xhrVC ) { console.log( 'error:', xhrVC  ); };
		xhrVC.onprogress = function( xhrVC ) { console.log( 'bytes loaded:', xhrVC.loaded  ); }; /// or something
		xhrVC.onload = getValChange;
		xhrVC.send( null );

		const xhrS = new XMLHttpRequest();
		xhrS.open( 'GET', urlStats, true );
		xhrS.onerror = function( xhrS ) { console.log( 'error:', xhrS  ); };
		xhrS.onprogress = function( xhrS ) { console.log( 'bytes loaded:', xhrS.loaded  ); }; /// or something
		xhrS.onload = getStats;
		xhrS.send( null );

		const xhrMS = new XMLHttpRequest();
		xhrMS.open( 'GET', urlMoreStats, true );
		xhrMS.onerror = function( xhrMS ) { console.log( 'error:', xhrMS  ); };
		xhrMS.onprogress = function( xhrMS ) { console.log( 'bytes loaded:', xhrMS.loaded  ); }; /// or something
		xhrMS.onload = getMoreStats;
		xhrMS.send( null );

		const xhrF = new XMLHttpRequest();
		xhrF.open( 'GET', urlFinancials, true );
		xhrF.onerror = function( xhrF ) { console.log( 'error:', xhrF  ); };
		xhrF.onprogress = function( xhrF ) { console.log( 'bytes loaded:', xhrF.loaded  ); }; /// or something
		xhrF.onload = getFinancials;
		xhrF.send( null );

		const xhrPeer = new XMLHttpRequest();
		xhrPeer.open( 'GET', urlPeers, true );
		xhrPeer.onerror = function( xhrPeer ) { console.log( 'error:', xhrPeer  ); };
		xhrPeer.onprogress = function( xhrPeer ) { console.log( 'bytes loaded:', xhrPeer.loaded  ); }; /// or something
		xhrPeer.onload = getPeers;
		xhrPeer.send( null );

		const xhrNews = new XMLHttpRequest();
		xhrNews.open( 'GET', urlNews, true );
		xhrNews.onerror = function( xhrNews ) { console.log( 'error:', xhrNews  ); };
		xhrNews.onprogress = function( xhrNews ) { console.log( 'bytes loaded:', xhrNews.loaded  ); }; /// or something
		xhrNews.onload = getNews;
		xhrNews.send( null );
		
	}

	function getName(xhrCN){
		
		let response, json, lines;

		response = xhrCN.target.response;
		json = JSON.parse( response );
		console.log('General Info', json );

		document.getElementById("loader").style.display = "none";

		info = document.getElementById("information");
		info.style.display = "grid";
		name = document.getElementById("stockName").innerHTML = json["companyName"];
		exchange_ticker = document.getElementById("exchange_ticker").innerHTML = json["exchange"] +": "+ json["symbol"];

		geninfo = document.getElementById("genInfo");
		geninfo.style.display = "block";
		document.getElementById("sector").innerHTML = json["sector"];
		document.getElementById("industry").innerHTML = json["industry"];
		document.getElementById("website").innerHTML = json["website"];
		document.getElementById("website").href = json["website"];
		document.getElementById("ceo").innerHTML = json["CEO"];
		document.getElementById("description").innerHTML = json["description"];
		mainpanel = document.getElementById("main");
		mainpanel.style.display = "grid";
		
		a = document.getElementById("stockAlert");
		a.style.display = "block";
		f = document.getElementById("kishan");
		f.style.display = "block";
	}

	function getLogo(xhrL){

		let response, json, lines;

		response = xhrL.target.response;
		json = JSON.parse( response );
		console.log('Logo Link', json );
		logo = document.getElementById("logo");
		logo.src = json["url"];
		logo.style.display = "block";
	}

	function getPrice(xhrP){

		let response, json, lines;

		response = xhrP.target.response;
		json = JSON.parse( response );
		console.log('Current Price', json );

		json = json.toFixed(2);
		document.getElementById("currentPrice").innerHTML = json.toString() + " USD";
	}

	function get5y(xhr5y){

		let response, json, lines;

		response = xhr5y.target.response;
		json = JSON.parse( response );
		console.log('5 Year Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["close"]));
	    	xaxis.push(json[i]["date"]);
	    	i = i+1;
		}

		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: '5 Years',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('5y');
		//d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}

	function get2y(xhr2y){

		let response, json, lines;

		response = xhr2y.target.response;
		json = JSON.parse( response );
		console.log('2 Year Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["close"]));
	    	xaxis.push(json[i]["date"]);
	    	i = i+1;
		}

		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: '2 Years',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('2y');
		//d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}

	function get1y(xhr1y){

		let response, json, lines;

		response = xhr1y.target.response;
		json = JSON.parse( response );
		console.log('1 Year Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["close"]));
	    	xaxis.push(json[i]["date"]);
	    	i = i+1;
		}

		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: '1 Year',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('1y');
		//d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}
var times = [];
	function getYtd(xhrY){

		let response, json, lines;

		response = xhrY.target.response;
		json = JSON.parse( response );
		console.log('Year to Data Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["close"]));
	    	xaxis.push(json[i]["date"]);
			times.push(json[i]["date"]);
	    	i = i+1;
		}
		ytd2 = values;
		console.log('Ytd', values);
		console.log('dates', xaxis);

		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: 'Year to Date',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('Ytd');
		//d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}

	function get6m(xhr6m){

		let response, json, lines;

		response = xhr6m.target.response;
		json = JSON.parse( response );
		console.log('6 Month Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["close"]));
	    	xaxis.push(json[i]["date"]);
	    	i = i+1;
		}

		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: '6 Months',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('6m');
		//d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}

	function get3m(xhr3m){

		let response, json, lines;

		response = xhr3m.target.response;
		json = JSON.parse( response );
		console.log('3 Month Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["close"]));
	    	xaxis.push(json[i]["date"]);
	    	i = i+1;
		}

		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: '3 Months',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('3m');
		//d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}
	
	var ytd = [];
	
	function get1m(xhr1m){

		let response, json, lines;

		response = xhr1m.target.response;
		json = JSON.parse( response );
		console.log('1 Month Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["close"]));
			ytd.push(Number(json[i]["close"]));
	    	xaxis.push(json[i]["date"]);
			
	    	i = i+1;
		}

		
		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: '1 Month',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('1m');
		//d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}

	function get1d(xhr1d){

		let response, json, lines;

		response = xhr1d.target.response;
		json = JSON.parse( response );
		console.log('1 Day Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (i=0; i<json.length; i++) { 
			if(Number(json[i]["average"]) === -1){
				continue;
			}
			else{
		    	values.push(Number(json[i]["average"]));
		    	xaxis.push(json[i]["label"]);
		    	//i = i+1;
		    }
		}

		//Set trace parameters
		var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: xaxis,
	  		y: values,
	  		line: {color: '#17BECF'}
		}

		//Set graph data
		var data = [trace1];

		//Set graph layout: title
		var layout = {
			title: '1 Day',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('1d');
		Plotly.newPlot(d,data,layout);
		var g = document.getElementById('graph');
		//var t = document.getElementsByClassName('tablink');
		g.style.display = "block";
		//var i = 0;
		//for(i=0; i<t.length; i++){
		//	t[i].style.display = "block";
		//}
		//console.log("STUFF",t);
		document.getElementById("defaultOpen").click();
	}

	function show(graphName){
		tabcontent = document.getElementsByClassName("tabcontent");
    	for (i = 0; i < tabcontent.length; i++) {
        	tabcontent[i].style.display = "none";
    	}

    	tablinks = document.getElementsByClassName("tablink");
    	for (i = 0; i < tablinks.length; i++) {
        	tablinks[i].style.backgroundColor = "";
    	}

		var d = document.getElementById(graphName);
		d.style.display = "block";	
	}

	function getValChange(xhrVC){

		let response, json, lines;

		response = xhrVC.target.response;
		json = JSON.parse( response );
		console.log('Present Day Data', json );

		values=[];
		xaxis=[];
		var i = 0;
		//Store stock data into array
		for (x in json) { 
	    	values.push(Number(json[i]["average"]));
	    	xaxis.push(json[i]["label"]);
	    	i = i+1;
		}

		var currentPriceTime = xaxis[xaxis.length - 1];
		time = currentPriceTime + " EST";

		var todaysDate = json[0]['date'];
		var year = todaysDate.substring(0,4);
		var month = Number(todaysDate.substring(4,6));
		var day = todaysDate.substring(6);
		months = ["January", "February", "March", "April", "May", "June",
					"July", "August", "September", "October", "November", "December"];
		var currentMonth = months[month - 1];

		date = currentMonth + " " + day + ", " + year;

		time_date = time + " - " + date;
		document.getElementById("currentPriceTime").innerHTML = time_date
	}

	function getStats(xhrS){

		let response, json, lines;

		response = xhrS.target.response;
		json = JSON.parse( response );
		console.log('Stats', json );	

		document.getElementById("mktcap").innerHTML = json["marketcap"];
		document.getElementById("beta").innerHTML = json["beta"];
		document.getElementById("divyield").innerHTML = json["dividendYield"];
	}


	function getMoreStats(xhrMS){

		let response, json, lines;

		response = xhrMS.target.response;
		json = JSON.parse( response );
		console.log('MoreStats', json );	

		document.getElementById("open").innerHTML = json["open"];
		document.getElementById("prevclose").innerHTML = json["previousClose"];
		document.getElementById("high").innerHTML = json["high"];
		document.getElementById("low").innerHTML = json["low"];
		document.getElementById("peratio").innerHTML = json["peRatio"];
		document.getElementById("keystats").style.display = "block";
		
		var change = json["change"];
		var percentChange = json["changePercent"].toString();
		arrow = document.getElementById('triangleup');
		if(change > 0){
			priceChange = document.getElementById('priceChange');
			priceChange.innerHTML = change.toString()+ "(" + percentChange + "%)";
			priceChange.style.color = "green"; 
			arrow.style.borderBottom = "";
			arrow.style.transform = "";
		}
		else if(change < 0){ 
			priceChange = document.getElementById('priceChange');
			priceChange.innerHTML = change.toString()+ "(" + percentChange + "%)"; 
			priceChange.style.color = "red";
			arrow.style.borderBottom = "10px solid #FF0000";
			arrow.style.transform = "rotate(180deg)";
		}
		arrow.style.display = "block";
	}

	function getFinancials(xhrF){

		let response, json, lines;

		response = xhrF.target.response;
		json = JSON.parse( response );
		console.log('Financials', json );

		document.getElementById("revenue").innerHTML = json["financials"][0]["totalRevenue"];	
		document.getElementById("opincome").innerHTML = json["financials"][0]["operatingIncome"];	
		document.getElementById("netincome").innerHTML = json["financials"][0]["netIncome"];
		document.getElementById("shequity").innerHTML = json["financials"][0]["shareholderEquity"];
		document.getElementById("cashflow").innerHTML = json["financials"][0]["cashFlow"];
		document.getElementById("totassets").innerHTML = json["financials"][0]["totalAssets"];
		document.getElementById("totliabilities").innerHTML = json["financials"][0]["totalLiabilities"];
		document.getElementById("grossprofit").innerHTML = json["financials"][0]["grossProfit"];
		document.getElementById("financials").style.display = "block";
	}

	function getPeers(xhrPeer){

		let response, json, lines;

		response = xhrPeer.target.response;
		json = JSON.parse( response );
		console.log('Peers', json );

		peerList = [];
		var i = 0;
		for (x in json) { 
			peerList[i] = json[i];
	    	i = i+1;
		}

		peer1 = document.getElementById("peer1");
		if(peerList[0].localeCompare("undefined") == 0){
			peer1.innerHTML = "";
		}
		else{
			peer1.innerHTML = peerList[0];
		}

		peer2 = document.getElementById("peer2");
		if(peerList[1].localeCompare("undefined") == 0){
			peer2.innerHTML = "";
		}
		else{
			peer2.innerHTML = peerList[1];
		}		
		
		peer3 = document.getElementById("peer3");
		if(peerList[2].localeCompare("undefined") == 0){
			peer3.innerHTML = "";
		}
		else{
			peer3.innerHTML = peerList[2];
		}

		peer4 = document.getElementById("peer4");
		if(peerList[3].localeCompare("undefined") == 0){
			peer4.innerHTML = "";
		}
		else{
			peer4.innerHTML = peerList[3];
		}

		peer5 = document.getElementById("peer5");
		if(peerList[4].localeCompare("undefined") == 0){
			peer5.innerHTML = "";
		}
		else{
			peer5.innerHTML = peerList[4];
		}						
		document.getElementById("alsosearched").style.display = "block";
	}

	function newSearch(symbol){
		document.getElementById('myInput').value = symbol.toString();
		myFunction();
	}

	function getNews(xhrNews){

		let response, json, lines;

		response = xhrNews.target.response;
		json = JSON.parse( response );
		console.log('News', json );

		headlines = [];
		links = [];
		source = [];
		var i = 0;
		for (x in json) { 
			headlines[i] = json[i]["headline"];
			links[i] = json[i]["url"];
			source[i] = json[i]["source"];
	    	i = i+1;
		}

		news1 = document.getElementById("news1");
		if(headlines[0].localeCompare("undefined") == 0){
			news1.innerHTML = "";
		}
		else{
			news1.innerHTML = headlines[0];
			news1.href = links[0];
		}

		news2 = document.getElementById("news2");
		if(headlines[1].localeCompare("undefined") == 0){
			news2.innerHTML = "";
		}
		else{
			news2.innerHTML = headlines[1];
			news2.href = links[1];
		}		
		
		news3 = document.getElementById("news3");
		if(headlines[2].localeCompare("undefined") == 0){
			news3.innerHTML = "";
		}
		else{
			news3.innerHTML = headlines[2];
			news3.href = links[2];
		}

		news4 = document.getElementById("news4");
		if(headlines[3].localeCompare("undefined") == 0){
			news4.innerHTML = "";
		}
		else{
			news4.innerHTML = headlines[3];
			news4.href = links[3];
		}

		news5 = document.getElementById("news5");
		if(headlines[4].localeCompare("undefined") == 0){
			news5.innerHTML = "";
		}
		else{
			news5.innerHTML = headlines[4];
			news5.href = links[4];
		}						
		document.getElementById("news").style.display = "block";
	}

function forecastResult(forecast){

		forecast = forecast[0];
		var xaxis = [];
		console.log("values",forecast)
		var num = times.length;
		for(i=0; i<num; i++){
			xaxis.push(times[i]);
		} 

		var lastDate = Number(xaxis[xaxis.length-1].substring(8));
		console.log('Last Date',lastDate)
		//newDate = (lastDate+1).toString();
		//console.log('New Date',newDate);
		//xaxis.push("2018-05-"+"0"+newDate);
		//times.push("2018-05-"+newDate);
		//ytd.push(null);

		console.log('orig time', times);
		console.log('forecast time', xaxis);
		var g = document.getElementById('Ytd');	
		
	/*	var trace1 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Close',
	  		x: times,
	  		y: ytd,
	  		line: {color: '#17BECF'}
		} */
		
		var trace2 = {
	  		type: "scatter",
	  		mode: "lines",
	  		name: 'Forecasted Close',
	  		x: xaxis,
	  		y: forecast,
	  		line: {color: '#111111'}
		};

		var layout = {
			title: 'Year to Date',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//var data = [trace1, trace2];
		Plotly.addTraces(g,trace2);
	}
</script>

</body>
</html>