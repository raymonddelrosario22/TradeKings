<?php
echo '<body style="background-color:yellow">';


$symbol = 'msft'; //STOCK TICKER (yhoo, amzn, googl, msft)

$url = 'https://api.iextrading.com/1.0/stock/'.$symbol.'/quote';
//https://api.iextrading.com/1.0/stock/aapl/quote
//OPEN THE ABOVE SITE TO SEE WHAT THE ACTUAL DATA LOOKS LIKE

// FETCH THE DATA FROM THE SITE
$jsondata = file_get_contents($url);
$json = json_decode($jsondata,true);
$output = "<ul>";
$CurrentPrice = $json['iexRealtimePrice'];
$PeRatio = $json['peRatio'];
echo "<strong>Stock Name: ", $json['companyName'],"<br>";
echo "Latest Price: " .$CurrentPrice. " USD","<br>";
echo "PE Vaue: ".$PeRatio."<br>";
?>