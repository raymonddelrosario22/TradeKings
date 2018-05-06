<!-- CODE WRITTEN BY CHRIS CENA:
	WITH API HELP FROM KRUIT PATEL-->

<!doctype html>


<?php

$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}

$connect=$db;

 

?>

<html>
<head>

<title> CHECK </title>

<style>
#search {
    width: 16em;  height: 2em;
}

</style>
</head>

<body>

	<form action="checkStock.php" method="POST">

		
		<center>  <br><br><br><br><br><br><br><br><br><br><br><br>
		<input type="submit" id="search" name="submit" value="CHECK"> or <a href="set.php">SET PAGE </a>
		</center>
		<br> <br> <br>
	</form>








<?php

if(isset($_POST['submit']))		//
	{ 	// 
		?>

<center>
		<?php $count=0;
	$check=mysqli_query($connect,"SELECT * FROM crypto ");
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
	
		
		<!--<br><br><br>  <b>TICKER:</b><?php //echo $tick2[0]; ?><br><br>
		<b>PRICE:</b><?php //echo $price2[0]; ?><br><br>-->
		
</center>
	</body>
</html>

<?php

for ($x = 0; $x < $count; $x++)

{
$reached2=0.0; $reached3=0.0; $reached=0.0; $price=-1;	




	if ($type[$x]!="sell") {
	if ($tick3[$x]!='NULL')

	{
$symbol = $tick3[$x]; //STOCK TICKER (yhoo, amzn, googl, msft)

$url = 'https://api.iextrading.com/1.0/stock/'.$symbol.'/quote';
//https://api.iextrading.com/1.0/stock/aapl/quote
//OPEN THE ABOVE SITE TO SEE WHAT THE ACTUAL DATA LOOKS LIKE

// FETCH THE DATA FROM THE SITE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";
$CurrentPrice = $json['latestPrice'];

$PeRatio = $json['peRatio'];
//echo "<strong>Stock Name: ", $json['companyName'],"<br>";
//echo "Latest Price: " .$CurrentPrice. " USD","<br>";
//echo "PE Vaue: ".$PeRatio."<br>";


if($price3[$x]>=$CurrentPrice && !$marker[$x] )  //
{
	$reached2=1;  

	@$txt.="The target price for ".$tick3[$x]." has been reached, as its current price is at ".$CurrentPrice." which was less than or equal to your target value of ".$price3[$x]. "\n\n";


mysqli_query($connect,"UPDATE `crypto` SET `Mark` ='1' WHERE `id` ='".$id[$x]."'");


}

}
}
//problems
else{
	if ($tick3[$x]!='NULL')

	{
$symbol = $tick3[$x]; //STOCK TICKER (yhoo, amzn, googl, msft)

$url = 'https://api.iextrading.com/1.0/stock/'.$symbol.'/quote';
//https://api.iextrading.com/1.0/stock/aapl/quote
//OPEN THE ABOVE SITE TO SEE WHAT THE ACTUAL DATA LOOKS LIKE

// FETCH THE DATA FROM THE SITE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";
$CurrentPrice = $json['latestPrice'];

$PeRatio = $json['peRatio'];



if($price3[$x]<=$CurrentPrice && !$marker[$x] )  //
{
	$reached2=1;  

	@$txt.="The target price for ".$tick3[$x]." has been reached, as its current price is at ".$CurrentPrice." which was greater than or equal to your target value of ".$price3[$x]. "\n\n";


mysqli_query($connect,"UPDATE `crypto` SET `Mark` ='1' WHERE `id` ='".$id[$x]."'");


}

}
}
//problems







?>




<?php



	if ($type[$x]!="sell") {
	if ($tick5[$x]!='NULL')
	{
$symbol = $tick5[$x]; //STOCK TICKER (yhoo, amzn, googl, msft)

$url = 'https://api.iextrading.com/1.0/stock/'.$symbol.'/quote';
//https://api.iextrading.com/1.0/stock/aapl/quote
//OPEN THE ABOVE SITE TO SEE WHAT THE ACTUAL DATA LOOKS LIKE

// FETCH THE DATA FROM THE SITE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";


$PeRatio = $json['peRatio'];



if($price5[$x]>=$PeRatio  && !$marker2[$x] )  //
{
	$reached3=1;

	@$txt.="The target value for ".$tick5[$x]." has been reached, as its current value is at ".$PeRatio." which was less than or equal to your target value of ".$price5[$x]. "\n\n";


	mysqli_query($connect,"UPDATE `crypto` SET `Mark2` ='1' WHERE `id` ='".$id[$x]."'");
}
}
}

else {
if ($tick5[$x]!='NULL')
	{
$symbol = $tick5[$x]; //STOCK TICKER (yhoo, amzn, googl, msft)

$url = 'https://api.iextrading.com/1.0/stock/'.$symbol.'/quote';
//https://api.iextrading.com/1.0/stock/aapl/quote
//OPEN THE ABOVE SITE TO SEE WHAT THE ACTUAL DATA LOOKS LIKE

// FETCH THE DATA FROM THE SITE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";


$PeRatio = $json['peRatio'];
//echo "<strong>Stock Name: ", $json['companyName'],"<br>";
//echo "Latest Price: " .$CurrentPrice. " USD","<br>";
//echo "PE Vaue: ".$PeRatio."<br>";


if($price5[$x]<=$PeRatio  && !$marker2[$x] )  //
{
	$reached3=1;

	@$txt.="The target value for ".$tick5[$x]." has been reached, as its current value is at ".$PeRatio." which was greater than or equal to your target value of ".$price5[$x]. "\n\n";


	mysqli_query($connect,"UPDATE `crypto` SET `Mark2` ='1' WHERE `id` ='".$id[$x]."'");
}
}
}



?>








<?php



  
	if ($type[$x]!="sell") {
	if($tick2[$x]!='NULL' &&  !$marker3[$x])
	{

echo '<body style="background-color:white">';
$apikey  = 'FC0H53AJLJN7ZI7H'; //API KEY
$interval = '1min';
$market = "EUR";
$symbol = $tick2[$x]; //STOCK TICKER
$function = 'DIGITAL_CURRENCY_INTRADAY';
$url = 'https://www.alphavantage.co/query?function='.$function.'&symbol='.$symbol.'&market='.$market.'&apikey='.$apikey;
//https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_INTRADAY&symbol=BTC&market=EUR&apikey=demo
//OPEN THE ABOVE SITE TO SEE WHAT THE ACTUAL DATA LOOKS LIKE

// FETCH THE DATA FROM THE SITE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";

//START GETTING THE INFORMATION WE WANT
$header = $json['Meta Data'];
//echo "<strong>Stock Name: ", $header['3. Digital Currency Name'],"<br>";
//echo "Last Refreshed: ", $header['7. Last Refreshed'],"<br>";
//echo "Interval: ", $header['6. Interval'],"<br>";
//echo "Type of Information:" .$function."</strong>";
	
//GET THE STOCK PRICE FOR EVERY 5 MINS FOR PAST 1000+ MINS, THE CURRENT VALUE IS THE FIRST ONE, IDK HOW TO PRINT IT OUT ALONE.
foreach($json['Time Series (Digital Currency Intraday)'] as $stock)
{
$output .= "<li>1. Current Price: ".$stock['1b. price (USD)']."</li>";
$price=$stock['1b. price (USD)'];


break; 
}
$output.="</ul>";
//echo "<br> <br>";
//echo $price;
echo "<br> <br>";

if($price2[$x]>=$price &&  !$marker3[$x] )  //
{
	$reached=1;

	@$txt.="The 



	price for ".$tick2[$x]." has been reached, as its current price is at ".$price." which was less than or equal to your target value of ".$price2[$x]. "\n\n";

	mysqli_query($connect,"UPDATE `crypto` SET `Mark3` ='1' WHERE `id` ='".$id[$x]."'");
}


}
}

else
{

if($tick2[$x]!='NULL' &&  !$marker3[$x])
	{

echo '<body style="background-color:white">';
$apikey  = 'FC0H53AJLJN7ZI7H'; //API KEY
$interval = '1min';
$market = "EUR";
$symbol = $tick2[$x]; //STOCK TICKER
$function = 'DIGITAL_CURRENCY_INTRADAY';
$url = 'https://www.alphavantage.co/query?function='.$function.'&symbol='.$symbol.'&market='.$market.'&apikey='.$apikey;
//https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_INTRADAY&symbol=BTC&market=EUR&apikey=demo
//OPEN THE ABOVE SITE TO SEE WHAT THE ACTUAL DATA LOOKS LIKE

// FETCH THE DATA FROM THE SITE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";

//START GETTING THE INFORMATION WE WANT
$header = $json['Meta Data'];
//echo "<strong>Stock Name: ", $header['3. Digital Currency Name'],"<br>";
//echo "Last Refreshed: ", $header['7. Last Refreshed'],"<br>";
//echo "Interval: ", $header['6. Interval'],"<br>";
//echo "Type of Information:" .$function."</strong>";
	
//GET THE STOCK PRICE FOR EVERY 5 MINS FOR PAST 1000+ MINS, THE CURRENT VALUE IS THE FIRST ONE, IDK HOW TO PRINT IT OUT ALONE.
foreach($json['Time Series (Digital Currency Intraday)'] as $stock)
{
$output .= "<li>1. Current Price: ".$stock['1b. price (USD)']."</li>";
$price=$stock['1b. price (USD)'];


break; 
}
$output.="</ul>";
//echo "<br> <br>";
//echo $price;
echo "<br> <br>";

if($price2[$x]<=$price &&  !$marker3[$x] )  //
{
	$reached=1;

	@$txt.="The target price for ".$tick2[$x]." has been reached, as its current price is at ".$price." which was greater than or equal to your target value of ".$price2[$x]. "\n\n";

	mysqli_query($connect,"UPDATE `crypto` SET `Mark3` ='1' WHERE `id` ='".$id[$x]."'");
}


}






}






// the magic


if ($reached || $reached2 || $reached3)

	{echo "MAIL SENT <br><br><br>";

		$mailTo=$email[$x];
			
		

		$headers="From: Trade Kings";


		


		$subject="Email Alerts";



		mail($mailTo,$subject,$txt,"From: tradekingsllc@gmail.com");

		echo "$txt";

	}
else {
	//echo "TARGETS NOT REACHED<br><br>";
}




}

}




?>