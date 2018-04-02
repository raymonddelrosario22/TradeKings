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

<html lang = "en" >
<!--This program takes in user search (cryptocurrency ticker) and obtains data from Alpha Vantage and CryptoCompare API. The data is obtained and manipulated using Javascript and is displayed to user to be used to analyze cryptocurrencies. The UI is done with combination of CSS grid which is used for the ogranizing of larger groups of information the whole page and Bootstrap which is used for the interior of smaller blocks. -->
<head>
<meta charset = "utf-8" >
<meta name = "viewport" content= "width=device-width, initial-scale=1" >
<meta name = "description" content = "Basic Alpha Vantage script" >
<meta name = "keywords" content = "Alpha Vantage,predIQtiv,JavaScript,GitHub" >
<meta name = "date" content = "2018-01-14 ~ " >
<title>Search Market</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

	/*Style background with color and margin*/
	body{
		background-color: lightgray;
		margin: 15px;
	}

	/*Establish common styling for different text levels*/
	p{
		font-size: 12px;
		font-family: verdana;
		font-weight: lighter;
	}

	a{
		font-size: 12px;
		font-family: verdana;
		font-weight: lighter;
	}

	/*Style search bar */
	form.example input[type=text] {
 		padding: 10px;
  		font-size: 14px;
  		border: 1px solid grey;
  		float: left;
  		width: 40%;
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

	/*Style common elements of the page based on defined standard */
	.heading{
		font-weight: bold;
		font-family: verdana;
	}

	#cryptoName{
		font-family: verdana;
		font-weight: bold;
		font-size: 24px;
		grid-area: cryptoName;
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

	#change{
		grid-area: change;
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

	.dataTitle{
		font-family: verdana;
		font-weight: lighter;
		font-size: 20px;
	}

	.general{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		grid-area: general;
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

	.relatedNews{
		background-color: white;
		padding: 5px;
		grid-area: news;	
		display: none;			
	}

	/*Design grid for basic crypto info */
	.info{
		background-color: white;
		padding-left: 5px;
		grid-area: basic;
		display: none;
		grid-template-columns: 1fr 1fr 1fr;
		grid-template-areas: 
		"cryptoName cryptoName ."
		"exchange_ticker currentPriceTime currentPriceTime"
		"currentPrice change .";
	}

	/*Design grid for main section of page (includes basic info, graph, and related news) */
	.mainpanel{
		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		grid-template-columns: 0.5fr 0.5fr 0.5fr;
		grid-template-areas: 
		"basic basic ."
		"graphs graphs graphs"
		"graphs graphs graphs"
		"graphs graphs graphs"
		"news news news";
		grid-area: mainpanel;
		display: none;	
	}

	/*More styling of general elements done below based on a determined standard */
	.grid{
		display: grid;
		grid-template-columns: 1fr 0.5fr 1fr;
		grid-template-areas: 
		"research research research"
		"mainpanel mainpanel general"
		"mainpanel mainpanel general"
		"mainpanel mainpanel ."
		"mainpanel mainpanel .";
		grid-column-gap: 20px;
		grid-row-gap: 20px;
	}

</style>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href = "newNav.css" rel = "stylesheet" type="text/css">	
</head>
<body style="background-image:url('perhaps.jpg'); 
		background-size:100%;">
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
				<input type="text" id="myInput" name="search" placeholder="Search Cryptocurrencies by Ticker.." style="height:36px;width:336.48px;">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		
		<div id="main" class="mainpanel">
			<div id="information" class="info">
				<p id="cryptoName"></p>
				<p id="exchange_ticker"></p>
				<p id="currentPriceTime"></p>
				<p id="currentPrice"></p>
				<div id="change">
					<p id="priceChange"></p>
					<div id="triangleup" class="triangle-up"></div>
				</div>
			</div>

			<div id="graph" class="graphs"></div>

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
					<p id="geninfotitle" class="dataTitle">Overview</p>
					<hr>
				</div>
			</div>
			<div class="row">
				<div id="geninforow2col1" class="col-md-6">
					<p class="heading">Open (USD)</p>
				</div>
				<div id="geninforow2col2" class="col-md-6">
					<p id="open"></p>
				</div>
			</div>
			<div class="row">
				<div id="geninforow3col1" class="col-md-6">
					<p class="heading">High (USD)</p>
				</div>
				<div id="geninforow3col2" class="col-md-6">
					<p id="high"></p>
				</div>
			</div>
			<div class="row">
				<div id="geninforow4col1" class="col-md-6">
					<p class="heading">Low (USD)</p>
				</div>
				<div id="geninforow4col2" class="col-md-6">
					<p id="low"></p>
				</div>
			</div>
			<div class="row">
				<div id="geninforow5col1" class="col-md-6">
					<p class="heading">Previous Close (USD)</p>
				</div>
				<div id="geninforow5col2" class="col-md-6">
					<a id="prevClose"></a>
				</div>
			</div>
			<div class="row">
				<div id="geninforow6col1" class="col-md-6">
 					<p class="heading">Market Cap (USD)</p>
				</div>
				<div id="geninforow6col2" class="col-md-6">
					<p id="mktCap"></p>
				</div>
			</div>
			<div class="row">
				<div id="geninforow7col1" class="col-md-6">
 					<p class="heading">Volume (total)</p>
				</div>
				<div id="geninforow7col2" class="col-md-6">
					<p id="volTotal"></p>
				</div>
			</div>
			<div class="row">
				<div id="geninforow8col1" class="col-md-6">
 					<p class="heading">Volume (24hr)</p>
				</div>
				<div id="geninforow8col2" class="col-md-6">
					<p id="vol24hr"></p>
				</div>
			</div>
			<div class="row">
				<div id="geninforow9col1" class="col-md-6">
 					<p class="heading">Circulating Supply</p>
				</div>
				<div id="geninforow9col2" class="col-md-6">
					<p id="circSupply"></p>
				</div>
			</div>
		</div>
	</div>
<script>

	//Display loader when serach is entered and move on to process user serach
	function myFunction() {
    	document.getElementById("loader").style.display = "block";
    	mySearch();
	}

	//Take user search and access the various groups of information the API provides in JSON format
	function mySearch(){

		var input, filter;
    	input = document.getElementById('myInput');
    	filter = input.value.toUpperCase();

    	const url = 'https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_INTRADAY&symbol='+ filter +'&market=USD&apikey=ORQGL39N6GSBB146';
    	const urlDaily = 'https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_DAILY&symbol='+ filter +'&market=USD&apikey=ORQGL39N6GSBB146';
    	const urlData = 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms='+ filter +'&tsyms=USD';
    	const urlNews = 'https://min-api.cryptocompare.com/data/news/?categories='+ filter +'&extraParams=YourSite';
    	 
	
		requestFile(url, urlDaily, urlData, urlNews);
	}

	//Get access to JSON data and call corresponding methods to parse and process the data for displaying
	function requestFile( url, urlDaily, urlData, urlNews ) {

		const xhr = new XMLHttpRequest();
		xhr.open( 'GET', url, true );
		xhr.onerror = function( xhr ) { console.log( 'error:', xhr  ); };
		xhr.onprogress = function( xhr ) { console.log( 'bytes loaded:', xhr.loaded  ); }; /// or something
		xhr.onload = getAssetData;
		xhr.send( null );

		const xhrDaily = new XMLHttpRequest();
		xhrDaily.open( 'GET', urlDaily, true );
		xhrDaily.onerror = function( xhrDaily ) { console.log( 'error:', xhrDaily  ); };
		xhrDaily.onprogress = function( xhrDaily ) { console.log( 'bytes loaded:', xhrDaily.loaded  ); }; /// or something
		xhrDaily.onload = getDailyData;
		xhrDaily.send( null );

		const xhrData = new XMLHttpRequest();
		xhrData.open( 'GET', urlData, true );
		xhrData.onerror = function( xhrData ) { console.log( 'error:', xhrData  ); };
		xhrData.onprogress = function( xhrData ) { console.log( 'bytes loaded:', xhrData.loaded  ); }; /// or something
		xhrData.onload = getStats;
		xhrData.send( null );

		const xhrNews = new XMLHttpRequest();
		xhrNews.open( 'GET', urlNews, true );
		xhrNews.onerror = function( xhrNews ) { console.log( 'error:', xhrNews  ); };
		xhrNews.onprogress = function( xhrNews ) { console.log( 'bytes loaded:', xhrNews.loaded  ); }; /// or something
		xhrNews.onload = getNews;
		xhrNews.send( null );
	}

	//get cryptocurrency data: basic information - name, price (Real time), market
	//get todays data at 5 minute increments and display graphcially using plotly.js
	function getAssetData( xhr ) {

		let response, json, lines;

		response = xhr.target.response;

		json = JSON.parse( response );
		console.log( 'Intraday', json );

		//Remove loader and Print stock symbol
		document.getElementById("loader").style.display = "none";
		document.getElementById("cryptoName").innerHTML = json["Meta Data"]["3. Digital Currency Name"];
		market = json["Meta Data"]["5. Market Name"];
		ticker = json["Meta Data"]["2. Digital Currency Code"];
		document.getElementById("exchange_ticker").innerHTML = market+ ": " +ticker

		values=[];
		xaxis=[];
		//Store stock data into array
		for (x in json["Time Series (Digital Currency Intraday)"]) { 
	    	values.push(Number(json["Time Series (Digital Currency Intraday)"][x]["1b. price (USD)"]));
	    	xaxis.push(x);
		}


		var currentPrice = Number(values[0]);
		currentPrice = currentPrice.toFixed(2);
		currentPrice = currentPrice.toString();
		document.getElementById("currentPrice").innerHTML = currentPrice + " USD";
		todaysDate = xaxis[0]
		var year = todaysDate.substring(0,4);
		var month = Number(todaysDate.substring(5,7));
		var day = todaysDate.substring(8,10);
		var time = todaysDate.substring(11);
		months = ["January", "February", "March", "April", "May", "June",
					"July", "August", "September", "October", "November", "December"];
		var currentMonth = months[month - 1];
		date = currentMonth + " " + day + ", " + year;
		time_date = time + " - " + date;
		document.getElementById("currentPriceTime").innerHTML = time_date;

		var change = Number(json["Time Series (Digital Currency Intraday)"][xaxis[0]]["1b. price (USD)"]) - Number(json["Time Series (Digital Currency Intraday)"][xaxis[xaxis.length - 1]]["1b. price (USD)"]);
		change = change.toFixed(3);
		var priceChange = document.getElementById('priceChange')

		if(change > 0){
			priceChange.innerHTML = change.toString();
			priceChange.style.color = "green"; 
			arrow = document.getElementById('triangleup');
			arrow.style.color = "green";
			arrow.style.display = "block";
		}
		else if(change < 0){ 
			priceChange.innerHTML = change.toString(); 
			priceChange.style.color = "red";
			arrow = document.getElementById('triangleup');
			arrow.style.display = "block";
			arrow.style.borderBottom = "10px solid #FF0000";
			arrow.style.transform = "rotate(180deg)";
		}

		document.getElementById("information").style.display = "grid";

		document.getElementById("genInfo").style.display = "block";

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
			title: 'Todays Change',
			xaxis: {title: 'Time'},
			yaxis: {title: 'Price (USD)'},
		}


		//Set parameters of div element for graph display
		var d = document.getElementById('graph');

		//Create plot at div element with specified data and layout
		Plotly.newPlot(d,data,layout);
		d.style.display = "block";

		document.getElementById("main").style.display = "grid";
	}

	//get daily data for several years
	function getDailyData(xhrDaily){

		let response, json, lines;

		response = xhrDaily.target.response;

		json = JSON.parse( response );
		console.log( 'Daily', json );


	}

	//get crypto stats that are used for analysis such as volume and maket cap
	function getStats(xhrData){
		
		let response, json, lines;

		response = xhrData.target.response;

		json = JSON.parse( response );
		console.log( 'Stats', json );

    	input = document.getElementById('myInput');
    	filter = input.value.toUpperCase();

		document.getElementById("open").innerHTML = json["RAW"][filter]["USD"]["OPENDAY"];
		document.getElementById("high").innerHTML = json["RAW"][filter]["USD"]["HIGHDAY"];
		document.getElementById("low").innerHTML = json["RAW"][filter]["USD"]["LOWDAY"];
		document.getElementById("volTotal").innerHTML = json["RAW"][filter]["USD"]["VOLUMEDAYTO"];
		document.getElementById("vol24hr").innerHTML = json["RAW"][filter]["USD"]["VOLUME24HOURTO"];
		document.getElementById("circSupply").innerHTML = json["RAW"][filter]["USD"]["SUPPLY"];
		document.getElementById("mktCap").innerHTML = json["RAW"][filter]["USD"]["MKTCAP"];

	}

	//obtain up to 5 articles of related news to searched cryptocurrency for user's analysis
	function getNews(xhrNews){
		
		let response, json, lines;

		response = xhrNews.target.response;

		json = JSON.parse( response );
		console.log( 'News', json );

		headlines = [];
		links = [];
		source = [];
		var i = 0;
		for (x in json) { 
			headlines[i] = json[i]["title"];
			links[i] = json[i]["url"];
			source[i] = json[i]["source"];
	    	i = i+1;
		}

		news1 = document.getElementById("news1");
		if(headlines[0] === undefined){
			news1.innerHTML = "";
		}
		else{
			news1.innerHTML = headlines[0];
			news1.href = links[0];
		}

		news2 = document.getElementById("news2");
		if(headlines[1] === undefined){
			news2.innerHTML = "";
		}
		else{
			news2.innerHTML = headlines[1];
			news2.href = links[1];
		}		
		
		news3 = document.getElementById("news3");
		if(headlines[2] === undefined){
			news3.innerHTML = "";
		}
		else{
			news3.innerHTML = headlines[2];
			news3.href = links[2];
		}

		news4 = document.getElementById("news4");
		if(headlines[3] === undefined){
			news4.innerHTML = "";
		}
		else{
			news4.innerHTML = headlines[3];
			news4.href = links[3];
		}

		news5 = document.getElementById("news5");
		if(headlines[4] === undefined){
			news5.innerHTML = "";
		}
		else{
			news5.innerHTML = headlines[4];
			news5.href = links[4];
		}						
		document.getElementById("news").style.display = "block";
	}

</script>
</body>
</html>
