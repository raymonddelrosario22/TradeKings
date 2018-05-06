<html>
<head>
<meta charset = "utf-8" >
<meta name = "viewport" content= "width=device-width, initial-scale=1" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	p{
		font-size: 12px;
	}

	a{
		font-size: 12px;
		font-family: verdana;
		font-weight: lighter;
	}
	body{
		background-image:url("hello.jpg")
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
		position: absolute;
		top: 10px;
		
 		padding: 10px;
  		font-size: 14px;
  		border: 1px solid grey;
  		float: left;
  		width: 30%;
  		background: #f1f1f1;	   
	}

	/* Style the submit button */
	form.example button {
		position:absolute;
		left: 370px;
		top:18px;
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
.graphs{
	position: absolute;
		background-color: white; 
		border:1px solid red;
		Top:220px; 
		left: 3px;
		height: 400px;
		width: 800px;
		grid-area: graphs;
		display: none;
	}
	


#stockName{
		position: absolute;
		top:40px;
		font-family: verdana;
		font-weight: bold;
		font-size: 24px;
		grid-area: stockName;
	}
	#currentPrice {
		font-family: verdana;
		font-weight: bold;
		font-size: 20px;
		font-color: green;
		grid-area: currentPrice;
	}
#high {
		font-family: verdana;
		font-weight: bold;
		font-size: 20px;
		grid-area: high;
	}
	#low {
		font-family: verdana;
		font-weight: bold;
		font-size: 20px;
		grid-area: low;
	}
	#prevClose {
		font-family: verdana;
		font-weight: bold;
		font-size: 20px;
		grid-area: prevClose;
	}
	#open {
		font-family: verdana;
		font-weight: bold;
		font-size: 20px;
		grid-area: open;
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
		font-size: 18px;
		grid-area: currentPriceTime;
	}

	#exchange_ticker{
		color: gray;
		font-family: verdana;
		font-weight: lighter;
		font-size: 18px;
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

</style>
 <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<style>
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
	
    background-color: #45a049;
}
div {
    border-radius: 5px;
	width: 50%;
    background-color: white;
    padding: 20px;
}
</style>
</html>

<?php

session_start();

$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}



//$email=$_SESSION['email'];
$email='nkp9733@gmail.com';
//$query = 'Select title from league where email=$email';

?>

<html lang="en">
<div id="graph" class="graphs"></div>
<table class="table thead-dark table-striped table-curved" align = "right" width = "500" id="activeLeagues" style="border: 2px solid black;background-color:white; border-radius: 25px;padding:10px">
				<thead style="background-color: #406cb7; color:white; border-bottom: 2px solid black;">
					<tr>
						<th data-sortable="true">Leagues</th>
					</tr>
				</thead>

				<?php
				$results = mysqli_query($db,'SELECT distinct id from containing where email="'.$email.'";');

while ($row = mysqli_fetch_array($results)) { //for every league
							//find out how many players are in each league using the ID
							$query = 'Select * from league where id="'.$row[0].'";';
							$leagueResults = mysqli_query($db,$query);
							while($leagues = $leagueResults->fetch_assoc()){
								$titleU = $leagues['title'];
								//$capitalU = $leagues['capital'];
								//$size = $leagues['size'];
							}
							$query = 'select count(distinct email) as times from containing where id="'.$row[0].'";';
							$playerResults = mysqli_query($db,$query);
							//while($playerResult = $playerResults->fetch_assoc()){
								//$playerCount=$playerResult['times'];
							//}
							
					?>	
								
								<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >								
								<tr>
									<td><?php echo $titleU; ?><input type="radio" id="radioButton" value="<?php echo $titleU;?>" name="leagueButton" onclick="myFunction()"></a></td>
									
								</tr>	
								</form>
								 
					<?php
				}
				?>
				
</table>	

	<script>
	var filter;
	function heloo(){
    mySearch();
	
	}

	function mySearch(){
		
		var input;
    	input = document.getElementById('myInput');
    	filter = input.value.toLowerCase();
		filter = 'googl';
		
    	const urlCompanyName = 'https://api.iextrading.com/1.0/stock/'+ filter +'/company';
    	const urlPrice = 'https://api.iextrading.com/1.0/stock/'+ filter +'/price';
    	const urlYtd = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/ytd';
    	const urlValChange = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/1d';
	
		
    	requestFile(urlCompanyName,urlPrice,urlYtd,urlValChange);
	}
	function requestFile(urlCompanyName,urlPrice,urlYtd,urlValChange) {

		const xhrY = new XMLHttpRequest();
		xhrY.open( 'GET', urlYtd, true );
		xhrY.onerror = function( xhrY ) { console.log( 'error:', xhrY  ); };
		xhrY.onprogress = function( xhrY ) { console.log( 'bytes loaded:', xhrY.loaded  ); }; /// or something
		xhrY.onload = getYtd;
		xhrY.send( null );
		
		const xhrCN = new XMLHttpRequest();
		xhrCN.open( 'GET', urlCompanyName, true );
		xhrCN.onerror = function( xhrCN ) { console.log( 'error:', xhrCN  ); };
		xhrCN.onprogress = function( xhrCN ) { console.log( 'bytes loaded:', xhrCN.loaded  ); }; /// or something
		xhrCN.onload = getName;
		xhrCN.send( null );
		
		const xhrP = new XMLHttpRequest();
		xhrP.open( 'GET', urlPrice, true );
		xhrP.onerror = function( xhrP ) { console.log( 'error:', xhrP  ); };
		xhrP.onprogress = function( xhrP ) { console.log( 'bytes loaded:', xhrP.loaded  ); }; /// or something
		xhrP.onload = getPrice;
		xhrP.send( null );
		
		const xhrVC = new XMLHttpRequest();
		xhrVC.open( 'GET', urlValChange, true );
		xhrVC.onerror = function( xhrVC ) { console.log( 'error:', xhrVC  ); };
		xhrVC.onprogress = function( xhrVC ) { console.log( 'bytes loaded:', xhrVC.loaded  ); }; /// or something
		xhrVC.onload = getValChange;
		xhrVC.send( null );
		
	

	}
function getName(xhrCN){
		
		let response, json, lines;

		response = xhrCN.target.response;
		json = JSON.parse( response );
		console.log('General Info', json );

		name = document.getElementById("stockName").innerHTML = json["companyName"];
		exchange_ticker = document.getElementById("exchange_ticker").innerHTML = json["exchange"] +": "+ json["symbol"];

	
	}
	
	function getPrice(xhrP){

		let response, json, lines;

		response = xhrP.target.response;
		json = JSON.parse( response );
		console.log('Current Price', json );

		json = json.toFixed(2);
		document.getElementById("currentPrice").innerHTML = json.toString() + " USD";
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

		
	function myFunction(){
	var radios = document.getElementsByName('leagueButton');
	
for (var i = 0, length = radios.length; i < length; i++)
{
 if (radios[i].checked)
 {
  // do whatever you want with the checked radio
  alert('You have selected League "' + radios[i].value + '"');
  var ans = radios[i].value;
  
  window.location = "ExecuteStockTrade_UnitTest2_Invalid Sell.php?leagueNameChosen=" + ans + "&filter=" + filter;
  break;
  // only one radio can be logically checked, don't check the rest

  
 }
}						
	}
	</script>	

<div id="loader"></div>
	
		<div class="research">
			<form class="example" onsubmit="heloo();return false">
				<input type="text" id="myInput" name="search" placeholder="Search Stocks by Ticker..">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	
<div id="graph" class="graphs"></div>
<div id="information" class="info">
				<p id="stockName"></p>
				<p id="exchange_ticker"></p>
				<p id="currentPriceTime"></p>
				<p id="currentPrice"></p>
			</div>

