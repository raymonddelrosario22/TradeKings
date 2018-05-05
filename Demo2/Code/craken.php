<!DOCTYPE html>
<html lang="en" >

<head>
<iframe
 src="https://widgets.tc2000.com/WidgetServer.ashx?id=100222"
 width="1250" 
 noresize="noresize" 
 scrolling="no" 
 height="16" 
 frameborder="0" 
 ></iframe>
  <meta charset="UTF-8">
  <title>Software Engineering</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  
<div class="container">
  
<header>
    
<i class="fa fa-bars" aria-hidden="true"></i>
  
</header>
  
<main>
    
<div class="row">
      
<div class="left col-lg-4">
        
<div class="photo-left">
          
<img class="photo" <img src="Linked1.jpg" alt="Chris">

</div>

</div>


<div class="info">        
<h4 class="name">Christopher Salandra</h4>
        
<p class="info">Trade Kings Manager</p>
        
<p class="info">Tradekings@gmail.com</p>

<div class="stats row">
<div class="stat col-xs-4" style="padding-right: 50px;">        
</div>
</div>
 
<div class="social">
          
<i class="fa fa-facebook-square" aria-hidden="true"></i>
          
<i class="fa fa-twitter-square" aria-hidden="true"></i>
          
<i class="fa fa-pinterest-square" aria-hidden="true"></i>
          
<i class="fa fa-tumblr-square" aria-hidden="true"></i>
        
</div>
      
</div>
      
<div class="right col-lg-8">
        
<ul class="nav" >

<li>My Portfolio</li>
          
<li>Home</li>
          
<li>Analyze</li>  
		  
<li>League</li>
          
<li>Forum</li>

<li>Logout</li>
        
</ul>
        

        
</div>


<object align="left">
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Market Data</span></a> by TradingView</div>
	 <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
  
  
  /* The following is an api from the help  of tradingview */
  
  
  
  /* The following is an api along with set companies for example */
  
  
  
  {
  "showChart": true,
  "locale": "en",
  "largeChartUrl": "",
  "width": "400",
  "height": "660",
  "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
  "plotLineColorFalling": "rgba(255, 74, 104, 1)",
  "gridLineColor": "rgba(233, 233, 234, 1)",
  "scaleFontColor": "rgba(233, 233, 234, 1)",
  "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
  "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
  "symbolActiveColor": "rgba(242, 250, 254, 1)",
  "tabs": [
    {
      "title": "Indices",
      "symbols": [
        {
          "s": "INDEX:IUXX",
          "d": "Nasdaq 100"
        },
        {
          "s": "INDEX:DOWI",
          "d": "Dow 30"
        },
        {
          "s": "INDEX:NKY",
          "d": "Nikkei 225"
        },
        {
          "s": "NASDAQ:AAPL",
          "d": "Apple"
		  
        },
        {
          "s": "NASDAQ:FB",
          "d": "Facebook"
		  
        }
      ],
      "originalTitle": "Indices"
    }
  ]
}
  </script>
</div>
</object>	  
		  
		  
<object align="right" hspace="170" vspace="170">

<b>
Player Card:

</b>


<ol>

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
$email='tradekingsllc@gmail.com';
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

		function myFunction(){
	var radios = document.getElementsByName('leagueButton');
	
for (var i = 0, length = radios.length; i < length; i++)
{
 if (radios[i].checked)
 {
  // do whatever you want with the checked radio
  alert('You have selected League "' + radios[i].value + '"');
 


 var ans = radios[i].value;
  window.location = "table.php?leagueName=" +ans;
 break;
  // only one radio can be logically checked, don't check the rest

  
 }
}						
	}
	</script>
	
	
	
</ol>


</object>	
     
 
</div>
  
</main>
</div>
  
  


</body>

</html>