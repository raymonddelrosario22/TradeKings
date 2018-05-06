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
<!--This program takes in user search (stock ticker) and obtains data from IEX API. The data is obtained and manipulated using Javascript and is displayed to user to be used to analyze stocks. The UI is done with combination of CSS grid which is used for the ogranizing of larger groups of information the whole page and Bootstrap which is used for the interior of smaller blocks. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<head>
<meta charset = "utf-8" >
<meta name = "viewport" content= "width=device-width, initial-scale=1" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	/*set background image and page margins */
	body{
		background-image:url('perhaps.jpg'); 
		background-size:100%;
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

	/*style loading symbol before data appears */
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

	/*Style common elements of the page based on defined standard */
	#stockName{
		font-family: verdana;
		font-weight: bold;
		font-size: 24px;
		grid-area: stockName;
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
		font-size: 85%;
		grid-area: description;
	}

	#sector{
		grid-area: description;
	}

	/*Design grid for basic stock info */
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

	/*Design grid for main section of page (includes basic info, graph, financials and related news) */
	.mainpanel{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); /*Add 3D effect to panel */
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

	/*More styling of general elements done below based on a determined standard */
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
		height:400px;
		grid-area: graphs;
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

	.dataTitle{
		font-family: verdana;
		font-weight: lighter;
		font-size: 20px;
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
		"research research research"
		"mainpanel mainpanel general"
		"mainpanel mainpanel general"
		"mainpanel mainpanel analytics"
		"mainpanel mainpanel peers"
		"mainpanel mainpanel .";
		grid-column-gap: 20px;
		grid-row-gap: 20px;
	}	


</style>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
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
				<li><a href="?portfolio=history">Transaction History</a></li>
			</ul>
      </li>
	  <li class="dropdown active">
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

	

	
	<div id="loader"></div>

	<div class="grid">
		<div class="research">
			<form class="example" onsubmit="myFunction();return false" style="height:36px;margin-left:20px;">
				<input type="text" id="myInput" name="search" placeholder="Search Stocks by Ticker.." style="height:36px">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
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
			<div id="graph" class="graphs"></div>
		
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
					<p class="heading">Prev Close</p>
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
					<a id="peer1" onclick="newSearch(this)"></a>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow3col1" class="col-md-12">
					<a id="peer2" href="?search=this" ></a>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow4col1" class="col-md-12">
					<a id="peer3" onclick="newSearch(this)"></a>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow5col1" class="col-md-12">
					<a id="peer4" onclick="newSearch(this)"></a>
				</div>
			</div>
			<div class="row">
				<div id="alsosearchedrow6col1" class="col-md-12">
					<a id="peer5" onclick="newSearch(this)"></a>
				</div>
			</div>
		</div>

	</div>

<script>
	var plottingResult=[]
	var ytd=[1,2,3,4,5,6]
	console.log(plottingResult)
	$(document).ready(function(){
		$("#kishan").click(function(){
			 async: false,
			$.post("http://localhost:5000/model",
			{
			  data1: JSON.stringify(ytd)
			},
			function(data,status){
				var predictResult = JSON.parse(data)
				plottingResult.push(predictResult)
				alert("Data: " + predictResult + "\nStatus: " + status);
				hello()
			});
		});
	});
	function hello(){
		console.log(plottingResult)
	}
	var filter;
	//Display loader when serach is entered and move on to process user serach
	function myFunction(){
    	document.getElementById("loader").style.display = "block";
    	mySearch();
	}

	//Take user search and access the various groups of information the API provides in JSON format
	function mySearch(){

		var input;
    	input = document.getElementById('myInput');
    	filter = input.value.toLowerCase();

    	const urlCompanyName = 'https://api.iextrading.com/1.0/stock/'+ filter +'/company';
    	const urlPrice = 'https://api.iextrading.com/1.0/stock/'+ filter +'/price';
    	const urlYtd = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/ytd';
    	const urlValChange = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/1d';
    	const urlLogo = 'https://api.iextrading.com/1.0/stock/'+ filter +'/logo';
    	const urlStats = 'https://api.iextrading.com/1.0/stock/'+ filter +'/stats';
    	const urlMoreStats = 'https://api.iextrading.com/1.0/stock/'+ filter +'/quote';
    	const urlFinancials = 'https://api.iextrading.com/1.0/stock/'+ filter +'/financials';
    	const urlPeers = 'https://api.iextrading.com/1.0/stock/'+ filter +'/peers';
    	const urlNews = 'https://api.iextrading.com/1.0/stock/'+ filter +'/news';

    	requestFile(urlCompanyName,urlPrice,urlYtd,urlValChange,urlLogo,urlStats,urlMoreStats,urlFinancials,urlPeers,urlNews);
	}

	//Get access to JSON data and call corresponding methods to parse and process the data for displaying
	function requestFile(urlCompanyName, urlPrice, urlYtd, urlValChange, urlLogo, urlStats, urlMoreStats, urlFinancials, urlPeers, urlNews) {

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

		const xhrY = new XMLHttpRequest();
		xhrY.open( 'GET', urlYtd, true );
		xhrY.onerror = function( xhrY ) { console.log( 'error:', xhrY  ); };
		xhrY.onprogress = function( xhrY ) { console.log( 'bytes loaded:', xhrY.loaded  ); }; /// or something
		xhrY.onload = getYtd;
		xhrY.send( null );

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

	//Get general info of stock including name, sector, website url, ceo, etc.
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
	}

	//get logo of the company whose stock was searched 
	function getLogo(xhrL){

		let response, json, lines;

		response = xhrL.target.response;
		json = JSON.parse( response );
		console.log('Logo Link', json );
		logo = document.getElementById("logo");
		logo.src = json["url"];
		logo.style.display = "block";
	}

	//get the current (real-time updating) price of the searched stock
	function getPrice(xhrP){

		let response, json, lines;

		response = xhrP.target.response;
		json = JSON.parse( response );
		console.log('Current Price', json );

		json = json.toFixed(2);
		document.getElementById("currentPrice").innerHTML = json.toString() + " USD";
	}

	//get the year to date data; for our purposes the close value of every day
	//take the data and display it in a graph form using plotly.js
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
			title: 'Year to Date',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}

		//Create plot at div element with specified data and layout
		var d = document.getElementById('graph');
		d.style.display = "block";
		Plotly.newPlot(d,data,layout);
	}

	//get the latest date and time of the data requested
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

	//get stock statistics such as market cap and data
	function getStats(xhrS){

		let response, json, lines;

		response = xhrS.target.response;
		json = JSON.parse( response );
		console.log('Stats', json );	

		document.getElementById("mktcap").innerHTML = json["marketcap"];
		document.getElementById("beta").innerHTML = json["beta"];
		document.getElementById("divyield").innerHTML = json["dividendYield"];
	}

	//get more adavanced stats such as PE ratio 
	//also obtain latest change (both in points and percentage) and display value with color based on positive (green) or negative (red) change
	//an upward or downward arrow in corresponding is also displayed respectively
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
		//positive change/rise: display green values with upward arrow
		if(change > 0){
			priceChange = document.getElementById('priceChange');
			priceChange.innerHTML = change.toString()+ "(" + percentChange + "%)";
			priceChange.style.color = "green"; 
			arrow = document.getElementById('triangleup');
			arrow.style.color = "green";
			arrow.style.display = "block";
		}
		//negative change/fall: display red values with downward arrow
		else if(change < 0){ 
			priceChange = document.getElementById('priceChange');
			priceChange.innerHTML = change.toString()+ "(" + percentChange + "%)"; 
			priceChange.style.color = "red";
			arrow = document.getElementById('triangleup');
			arrow.style.display = "block";
			arrow.style.borderBottom = "10px solid #FF0000";
			arrow.style.transform = "rotate(180deg)";
		}
	}

	//get company financials which can be used for the analysis of a stock
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

	//get 5 similar equities based on the one searched by the user 
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

	//get 5 news headlines that effect/relate to the performance of the company/stock searched
	//display headline as hyperlink to actual article on its source(original website)
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



</script>

<div id="tensorflow">
	
	<button id="kishan">something </button>

</div>

</body>
</html>