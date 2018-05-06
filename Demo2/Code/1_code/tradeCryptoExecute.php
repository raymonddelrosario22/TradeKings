<html>
<head>
<meta charset = "utf-8" >
<meta name = "viewport" content= "width=device-width, initial-scale=1" >
<meta name = "description" content = "Basic Alpha Vantage script" >
<meta name = "keywords" content = "Alpha Vantage,predIQtiv,JavaScript,GitHub" >
<meta name = "date" content = "2018-01-14 ~ " >
<title>BUY CRYPTOCURRENCY</title>
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




	#cryptoName{
		/*position: absolute;
		top: 40px;*/
		
		font-family: verdana;
		font-weight: bold;
		font-size: 24px;
		grid-area: cryptoName;
	}
	#currentPrice {
		/*position: absolute;
		top:140px;*/
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
		/*position: absolute;
		top:115;*/
		
		color: gray;
		font-family: verdana;
		font-weight: lighter;
		font-size: 18px;
		grid-area: currentPriceTime;
	}

	#exchange_ticker{
		/*position: absolute;
		top:85;*/
		
		color: gray;
		font-family: verdana;
		font-weight: lighter;
		font-size: 18px;
		grid-area: exchange_ticker;
	}

	.graphs{
	position: absolute;
		background-color: white; 
		border:1px solid red;
		Top:220px; 
		left: 3px;
		height: 400px;
		width: 700px;
		grid-area: graphs;
		display: none;
	}
.info{
		position: absolute;
		background-color: white;
		width: 700px;
		left: 3px;
		
	
	}
	
	div {
    border-radius: 5px;
	width: 85%;
    background-color: white;
    padding: 20px;
}

</style>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	
</head>

<style>
form {
  position: absolute;
  right: 10px;
  
}
input[type=text], select {
	
    width: 90%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 90%;
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
if(isset($_GET['leagueName']) & isset($_GET['filter']) ){
	$leagueTitle = $_GET['leagueName'];
	$filter = $_GET['filter'];
	//echo $filter;
	//echo $leagueTitle;
	 
}else{
	//echo $leagueTitle;
	
}
?>


<html>
<body>
<?php
				$leagueTitle = $_GET['leagueName'];
				$sql2 = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
				$result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
				if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					$startBalance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					//echo "Your current balance is $$startBalance";
					}
				}
?>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']."?leagueName=".$leagueTitle."&filter=".$filter; ?>" >
<div>

<?php
echo "Balance: $$startBalance";
?>

<input type="text" id="shares" name="shares" placeholder="How many Units would you like to BUY or SELL?">
   
<input type="submit" name="buy" value="Buy Units"><br> 
<input type="submit" name="sell" value="Sell Units"><br> 
<input type="submit" name="treasury" value="NEW! Buy a 10-year treasury bond!"><br>
<?php

echo '<body style="background-color:lightgray">';
//$newbalance = 10000;//Users balance in the database

$symbol = $filter;
$url = 'https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_INTRADAY&symbol='.$symbol.'&market=USD&apikey=FC0H53AJLJN7ZI7H';
 //STOCK THE USER WANTS TO PURCHASE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";
$header = $json['Meta Data'];
//echo "<strong>Cryptocurrency Name: ", $header['3. Digital Currency Name'],"<br>";
foreach($json['Time Series (Digital Currency Intraday)'] as $stock){
$output = $stock['1b. price (USD)'];
break;
}
$CurrentPrice = round($output,2);


if(isset($_GET['leagueName'])){
	$leagueTitle = $_GET['leagueName'];
}
else{
	
}

	if(isset($_POST['buy']) & isset($_GET['leagueName'])) 
{  
	$leagueTitle = $_GET['leagueName'];
	$sql = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
		$result = mysqli_query($db, $sql) or die(mysqli_error($db));
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$balance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					//echo $balance;
					}
					} else echo 0;
	
	$numofshares = $_POST['shares']; //Number of Shares Bought ***
	$newbalance = $balance - ($numofshares*$CurrentPrice); //New Balance after purchasing ***
		$value = $numofshares*$CurrentPrice;
		//$sqltemp = "UPDATE Capital SET balance=5000 WHERE email = '$email' ";//USE THIS TO RESET THE BALANCE IN DB, TESTING PURPOSES
		
		if($newbalance <0){ 
		echo "You cannot buy these many shares, Try Again!";
		
		} else if ($numofshares ==0) 
			echo "Error, Try Again!"; else {
		echo "<br>Congrats, You Have Successfully bought $numofshares shares. ";
    //echo "Congratulations, You Have Successfully bought $numofshares shares.";
    echo "<br>Your New Account Balance is $$newbalance"; 
	$sql2 = "UPDATE Capital SET balance = '$newbalance' WHERE email = '$email' AND leagueName = '$leagueTitle' ";
	mysqli_query($db,$sql2);
	$sq13 = "INSERT INTO Portfolio VALUES ('$email', '$symbol', '$numofshares', '$value', '$leagueTitle', 0); ";
	mysqli_query($db, $sq13);
} } else 
	
			if(isset($_POST['sell']) & isset($_GET['leagueName'])){
				$leagueTitle = $_GET['leagueName'];
				$sql2 = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
				$result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
				if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					$startBalance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
			
					}
					} else echo 0;
	
				$sql = "SELECT ticker,amount,value FROM UserRegistrationDB.Portfolio WHERE email = '$email' AND leagueName = '$leagueTitle'";	
				$result = mysqli_query($db, $sql) or die(mysqli_error($db));
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							$ticker = $row["ticker"]; //////////////////// PULL BALANCE BY EMAIL
							$amount = $row['amount'];
							$value = $row['value'];
							//echo $ticker; //stock name
							//echo '  ';
							//echo $amount; //number of shares
							//echo '  ';
							//echo $value;  // balance
					}
					} else{
						//echo 0;
					}
				$numofshares = $_POST['shares']; //Number of Shares sold ***
				if ($numofshares > $amount | $amount = 0) 
					echo "<br>You Don't Have Enough Shares to Sell,  Try Again!";
				else if($numofshares ==0)
					echo "<br>Error Try Again,  Try Again!";
					else {
				$newbalance = $startBalance + ($numofshares*$CurrentPrice); //New Balance after purchasing ***
				$calculatedValue = $numofshares*$CurrentPrice;
				$newValue = $value - $calculatedValue;
				$newAmountShares = $amount-$numofshares;
				echo "<br>Congrats, You Have Successfully sold $numofshares shares. ";
				//echo "Congratulations, You Have Successfully sold $numofshares shares.";
				echo "<br>Your New Account Balance is $$newbalance";
				$sql4 = "UPDATE Capital SET balance = '$newbalance' WHERE email = '$email' AND leagueName = '$leagueTitle' ";
				mysqli_query($db,$sql4);
				$sq15 = "UPDATE Portfolio SET amount = '$newAmountShares', value = '$newValue' WHERE email = '$email' AND leagueName = '$leagueTitle' AND ticker = '$symbol'";
				mysqli_query($db, $sq15);
				
}}else if(isset($_POST['treasury']) & isset($_GET['leagueName'])) 
{  
	$leagueTitle = $_GET['leagueName'];
	$sql = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
		$result = mysqli_query($db, $sql) or die(mysqli_error($db));
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$balance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					
					}
					} else echo 0;
	
	$faceValue = $_POST['shares']; //Number of Shares Bought ***
	$newbalance = $balance - $faceValue; //New Balance after purchasing ***
		//$value = $numofshares*$CurrentPrice;
		//$sqltemp = "UPDATE Capital SET balance=5000 WHERE email = '$email' ";//USE THIS TO RESET THE BALANCE IN DB, TESTING PURPOSES
		$newbalance=round($newbalance, 2);
		if($newbalance <0){ 
		echo "You cannot buy a treasury bond with this face value, Try Again!";
		
		} else if ($faceValue ==0) 
			echo "<br>Error, Try Again!"; else {
    echo "<br>You Have Successfully bought a Treasury Bond with a face value of $$faceValue.";
	echo "<br>The current treasury rate is 2.97%";
    echo "<br>Your New Account Balance is $$newbalance"; 
	$sql2 = "UPDATE Capital SET balance = '$newbalance' WHERE email = '$email' AND leagueName = '$leagueTitle' ";
	mysqli_query($db,$sql2);
	$sq13 = "INSERT INTO Portfolio VALUES ('$email', 'treasury', 1, '$faceValue', '$leagueTitle', 0); ";
	mysqli_query($db, $sq13);
} }
	
?>
</div>
</form>

<html lang="en">
<div id="graph" class="graphs"></div>
<script>
		var filter = "<?php echo $symbol; ?>"

    	const url = 'https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_INTRADAY&symbol='+ filter +'&market=USD&apikey=ORQGL39N6GSBB146';
		requestFile(url);
	
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
	
</script>
</body>
		<div id = "information" class = "info">
				<p id="cryptoName"></p>
				<p id="exchange_ticker"></p>
				<p id="currentPriceTime"></p>
				<p id="currentPrice"></p>
			<div>
		
			
</html>
