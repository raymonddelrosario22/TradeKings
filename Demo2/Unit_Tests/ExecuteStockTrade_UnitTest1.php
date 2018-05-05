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
		left: 7px;
		height: 400px;
		width: 800px;
		grid-area: graphs;
		display: none;
	}
	


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
	.info{
		
		background-color: white;
		width: 800px;
		left: 3px;
	
	}

	#change{
		grid-area: change;
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
div {
    border-radius: 5px;
	width: 85%;
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
if(isset($_GET['leagueNameChosen']) & isset($_GET['filter']) ){
	$leagueTitle = $_GET['leagueNameChosen'];
	$filter = $_GET['filter'];
	//echo $filter;
	//echo $leagueTitle;
	 
}else{
	//echo $leagueTitle;
	
}
?>




	
				
			

 



<?php



echo '<body style="background-color:lightgray">';
//$newbalance = 10000;//Users balance in the database
//if(isset($_GET['filter'])){
//$symbol = $_GET['filter'];
//$url = 'https://api.iextrading.com/1.0/stock/'.$symbol.'/quote';
//} //STOCK THE USER WANTS TO PURCHASE
//else{
$symbol = 'googl';
$url = 'https://api.iextrading.com/1.0/stock/'.$symbol.'/quote';
//}


$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";
$CurrentPrice = $json['iexRealtimePrice']; //Current LIVE price
//echo "<strong>Stock Name: ", $json['companyName'],"<br>";  //Company Name ***
//echo "Latest Price: " .$CurrentPrice. " USD","<br>";       



if(isset($_GET['leagueNameChosen'])){
	$leagueTitle = $_GET['leagueNameChosen'];

}else{
	//echo $leagueTitle;
	
}
	

if(isset($_POST['buy']) & isset($_GET['leagueNameChosen'])) 
{   
	//$leagueTitle = 'AnotherOne';
	$sql = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
		$result = mysqli_query($db, $sql) or die(mysqli_error($db));
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$balance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					//echo $balance;
					}
					} else echo 0;
	$balance = 1000;
	//$numofshares = $_POST['shares']; //Number of Shares Bought ***
	$numofshares = 30;
	//echo $numofshares;
	$CurrentPrice = 2000;
	//echo $CurrentPrice;
	$newbalance = $balance - ($numofshares*$CurrentPrice); //New Balance after purchasing ***
		$value = $numofshares*$CurrentPrice;
		//$sqltemp = "UPDATE Capital SET balance=5000 WHERE email = '$email' ";//USE THIS TO RESET THE BALANCE IN DB, TESTING PURPOSES
		
		if($newbalance <0){ 
		echo "You cannot buy these many shares, Try Again!";
		
		} else if ($numofshares ==0) 
			echo "Error, Try Again!"; else {
    echo "Congratulations, You Have Successfully bought $numofshares shares.";
    echo "<br>Your New Account Balance is $$newbalance"; 
	$sql2 = "UPDATE Capital SET balance = '$newbalance' WHERE email = '$email' AND leagueName = '$leagueTitle' ";
	mysqli_query($db,$sql2);
	$sq13 = "INSERT INTO Portfolio VALUES ('$email', '$symbol', '$numofshares', '$value', '$leagueTitle', 0); ";
	mysqli_query($db, $sq13);
} } else 
	
			if(isset($_POST['sell']) & isset($_GET['leagueNameChosen'])){
				$leagueTitle = $_GET['leagueNameChosen'];
				$sql2 = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
				$result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
				if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					$startBalance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					//echo $startBalance;
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
					echo "You Don't Have Enough Shares to Sell,  Try Again!";
				else if($numofshares ==0)
					echo "Error Try Again,  Try Again!";
					else {
				$newbalance = $startBalance + ($numofshares*$CurrentPrice); //New Balance after purchasing ***
				$calculatedValue = $numofshares*$CurrentPrice;
				$newValue = $value - $calculatedValue;
				$newAmountShares = $amount-$numofshares;
				echo "Congratulations, You Have Successfully sold $numofshares shares.";
				echo "<br>Your New Account Balance is $$newbalance";
				$sql4 = "UPDATE Capital SET balance = '$newbalance' WHERE email = '$email' AND leagueName = '$leagueTitle' ";
				mysqli_query($db,$sql4);
				$sq15 = "UPDATE Portfolio SET amount = '$newAmountShares', value = '$newValue' WHERE email = '$email' AND leagueName = '$leagueTitle' AND ticker = '$symbol'";
				mysqli_query($db, $sq15);
				
}}
			else if(isset($_POST['borrow']) & isset($_GET['leagueNameChosen'])) 
{  
	$leagueTitle = $_GET['leagueNameChosen'];
	$sql = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
		$result = mysqli_query($db, $sql) or die(mysqli_error($db));
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$balance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					//echo $balance;
					}
					} else echo 0;
	
	$numofshares = $_POST['shares']; //Number of Shares Bought ***
	$newbalance = $balance - ($numofshares*$CurrentPrice*.05); //New Balance after purchasing ***
		$value = $numofshares*$CurrentPrice;
		$fee = $value*.05;
		//$sqltemp = "UPDATE Capital SET balance=5000 WHERE email = '$email' ";//USE THIS TO RESET THE BALANCE IN DB, TESTING PURPOSES
		$newbalance=round($newbalance, 2);
		$fee = round($fee, 2);
		if($newbalance <0){
		//echo $balance;
		//echo $newbalance;
		echo "You cannot buy these many shares, Try Again!";
		
		} else if ($numofshares ==0) 
			echo "Error, Try Again!"; else {
    echo "Congratulations, You Have Successfully borrowed $numofshares shares from your broker. The transaction fee was $$fee (5% of the order).";
    echo "<br>Your New Account Balance is $$newbalance"; 
	//echo $symbol;
	$sql6 = "UPDATE Capital SET balance = '$newbalance' WHERE email = '$email' AND leagueName = '$leagueTitle' ";
	mysqli_query($db,$sql6);
	$sq17 = "INSERT INTO Portfolio VALUES ('$email', '$symbol', '$numofshares', '$value', '$leagueTitle', 1); ";
	mysqli_query($db, $sq17);
} } 


else if(isset($_POST['return']) & isset($_GET['leagueNameChosen'])){
				$leagueTitle = $_GET['leagueNameChosen'];
				$sql2 = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
				$result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
				if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					$startBalance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					//echo $startBalance;
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
				if ($numofshares != $amount | $amount = 0) 
					echo "You need to return the same number of shares you borrowed,  Try Again!";
				else if($numofshares ==0)
					echo "Error Try Again,  Try Again!";
					else {
				$calculatedValue = $numofshares*$CurrentPrice;
				$newValue = $calculatedValue - $value;
				$newAmountShares = $amount-$numofshares;
				$newbalance = $startBalance + $newValue; 
				echo "Congratulations, You Have Successfully returned $numofshares shares to your broker.";
				echo "You made a profit/loss of $$newValue on this short sell.";
				echo "<br>Your New Account Balance is $$newbalance";
				$sql4 = "UPDATE Capital SET balance = '$newbalance' WHERE email = '$email' AND leagueName = '$leagueTitle' ";
				mysqli_query($db,$sql4);
				$sq15 = "UPDATE Portfolio SET amount = 0, value = 0 WHERE email = '$email' AND leagueName = '$leagueTitle' AND ticker = '$symbol'";
				mysqli_query($db, $sq15);

}}
?>
<html>
<body>

<?php
				$leagueTitle = $_GET['leagueNameChosen'];
				$sql2 = "SELECT balance FROM UserRegistrationDB.Capital WHERE email = '$email' AND leagueName = '$leagueTitle' ";	
				$result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
				if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					$startBalance = $row["balance"]; //////////////////// PULL BALANCE BY EMAIL
					//echo "Your current balance is $$startBalance";
					}
				}
?>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']."?leagueNameChosen=".$leagueTitle; ?>" >
<div>
<?php
$startBalance = 1000;
echo "Balance: $$startBalance";
?>

<input type="text" id="shares" name="shares" placeholder="How many Shares would you like to BUY or SELL?">
  
<input type="submit" name="buy" value="Buy Shares"><br> 
<input type="submit" name="sell" value="Sell Shares"><br> 
<input type="submit" name="borrow" value="Short Sell: Borrow Shares"><br> 
<input type="submit" name="return" value="Short Sell: Return Shares"><br> 
</div>


</form>

<html lang="en">
<div id="graph" class="graphs"></div>
<script>
	var filter = "<?php echo $filter; ?>"

		
    	const urlCompanyName = 'https://api.iextrading.com/1.0/stock/'+ filter +'/company';
    	const urlPrice = 'https://api.iextrading.com/1.0/stock/'+ filter +'/price';
    	const urlYtd = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/ytd';
    	const urlValChange = 'https://api.iextrading.com/1.0/stock/'+ filter +'/chart/1d';
	
		
    	requestFile(urlCompanyName,urlPrice,urlYtd,urlValChange);
	
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
</script>
</body>			
	
<div id="graph" class="graphs"></div>
<div id="information" class="info">
				<p id="stockName"></p>
				<p id="exchange_ticker"></p>
				<p id="currentPriceTime"></p>
				<p id="currentPrice"></p>
			</div>

</html>
