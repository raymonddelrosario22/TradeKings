<html>
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
		background-image: url("hello.jpg");
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
		position: absolute;
		
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
	.info{
		
		position: absolute;
		top:55px;
		left:3px;
		width: 800px;
		
		
	}
	.graphs{
	position: absolute;
		background-color: white; 
		border:1px solid red;
		Top:270px; 
		left: 3px;
		height: 400px;
		width: 800px;
		grid-area: graphs;
		display: none;
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


</style>
</html>

<?php
echo '<body style="background-color:lightgray">';
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
<table class="table thead-dark table-striped table-curved" align = "right" width = "500" id="activeLeagues" style="border: 2px solid black; border-radius: 25px;padding:10px;background-color:white">
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
	function heloo() {
    	document.getElementById("loader").style.display = "block";
    	mySearch();
	}

	//Take user search and access the various groups of information the API provides in JSON format
	function mySearch(){

		var input;
    	input = document.getElementById('myInput');
    	filter = input.value.toLowerCase();

    	const url = 'https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_INTRADAY&symbol='+ filter +'&market=USD&apikey=ORQGL39N6GSBB146';
requestFile(url);
	}
function requestFile( url ) {

		const xhr = new XMLHttpRequest();
		xhr.open( 'GET', url, true );
		xhr.onerror = function( xhr ) { console.log( 'error:', xhr  ); };
		xhr.onprogress = function( xhr ) { console.log( 'bytes loaded:', xhr.loaded  ); }; /// or something
		xhr.onload = getAssetData;
		xhr.send( null ); }

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
  window.location = "tradeCryptoExecute.php?leagueName=" + ans + "&filter=" + filter;
 break;
  // only one radio can be logically checked, don't check the rest

  
 }
}						
	}
	</script>			

<div id="loader"></div>
	
	
		<div class="research">
			<form class="example" onsubmit="heloo();return false" style="height:36px;margin-left:20px;">
				<input type="text" id="myInput" name="search" placeholder="Search Cryptocurrencies by Ticker.." style="height:36px;width:336.48px;">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		
		<div id="graph" class="graphs"></div>
			<div class="info" style="background-color:white;">
				<p id="cryptoName"></p>
				<p id="exchange_ticker"></p>
				<p id="currentPriceTime"></p>
				<p id="currentPrice"></p>
			</div>

			
	

