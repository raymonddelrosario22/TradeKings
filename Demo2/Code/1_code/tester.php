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
<?php
$api_key = "fUFzpqVdppjLLoz1CsGq";
$str = file_get_contents('https://www.quandl.com/api/v3/datasets/LME/ST_CCG_ALL.json?api_key=fUFzpqVdppjLLoz1CsGq');
$json = json_decode($str, true);
$name=$json['dataset']['name'];
$lastdate=$json['dataset']['newest_available_date'];
$openprice=$json['dataset']['data'][0][1];
$closingprice=$json['dataset']['data'][0][4];

$str = file_get_contents('https://www.quandl.com/api/v3/datasets/CME/GCM2018.json?api_key=fUFzpqVdppjLLoz1CsGq');
$json1 = json_decode($str, true);
 '<pre>' . print_r($json1, true) . '</pre>';
$name1=$json1['dataset']['name'];
$lastdate1=$json1['dataset']['newest_available_date'];
$high1=$json1['dataset']['data'][0][2];
$low1=$json1['dataset']['data'][0][3];


$str = file_get_contents('https://www.quandl.com/api/v3/datasets/CME/CLM2018.json?api_key=fUFzpqVdppjLLoz1CsGq');
$json2 = json_decode($str, true);
 '<pre>' . print_r($json2, true) . '</pre>';
$name2=$json2['dataset']['name'];
$lastdate2=$json2['dataset']['newest_available_date'];
$high2=$json2['dataset']['data'][0][2];
$low2=$json2['dataset']['data'][0][3];

$str = file_get_contents('https://www.quandl.com/api/v3/datasets/CHRIS/MCX_AL2.json?api_key=fUFzpqVdppjLLoz1CsGq');
$json3 = json_decode($str, true);
 '<pre>' . print_r($json3, true) . '</pre>';
$name3=$json3['dataset']['name'];
$lastdate3=$json3['dataset']['newest_available_date'];
$high3=$json3['dataset']['data'][0][2];
$low3=$json3['dataset']['data'][0][3];


$str = file_get_contents('https://www.quandl.com/api/v3/datasets/CHRIS/MCX_CT1.json?api_key=fUFzpqVdppjLLoz1CsGq');
$json4 = json_decode($str, true);
 '<pre>' . print_r($json4, true) . '</pre>';
$name4=$json4['dataset']['name'];
$lastdate4=$json4['dataset']['newest_available_date'];
$high4=$json4['dataset']['data'][0][2];
$low4=$json4['dataset']['data'][0][3];


$str = file_get_contents('https://www.quandl.com/api/v3/datasets/CHRIS/MCX_ZN2.json?api_key=fUFzpqVdppjLLoz1CsGq');
$json5 = json_decode($str, true);
 '<pre>' . print_r($json5, true) . '</pre>';
$name5=$json5['dataset']['name'];
$lastdate5=$json5['dataset']['newest_available_date'];
$high5=$json5['dataset']['data'][0][2];
$low5=$json5['dataset']['data'][0][3];


$str = file_get_contents('https://www.quandl.com/api/v3/datasets/CME/SIM2018.json?api_key=fUFzpqVdppjLLoz1CsGq');
$json6 = json_decode($str, true);
 '<pre>' . print_r($json6, true) . '</pre>';
$name6=$json6['dataset']['name'];
$lastdate6=$json6['dataset']['newest_available_date'];
$high6=$json6['dataset']['data'][0][2];
$low6=$json6['dataset']['data'][0][3];

	

$str = file_get_contents('https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=98d4d58737b14c8faf97d18e498dbd45');
$json7 = json_decode($str, true);
 '<pre>' . print_r($json7, true) . '</pre>';
$title=$json7['articles']['0']['title'];
$title1=$json7['articles']['1']['title'];
$title2=$json7['articles']['2']['title'];
$title3=$json7['articles']['3']['title'];
$title4=$json7['articles']['4']['title'];
$title5=$json7['articles']['5']['title'];
$title6=$json7['articles']['6']['title'];
$title7=$json7['articles']['7']['title'];
$title8=$json7['articles']['8']['title'];
$title9=$json7['articles']['9']['title'];
$url=$json7['articles']['0']['url'];
$url1=$json7['articles']['1']['url'];
$url2=$json7['articles']['2']['url'];
$url3=$json7['articles']['3']['url'];
$url4=$json7['articles']['4']['url'];
$url5=$json7['articles']['5']['url'];
$url6=$json7['articles']['6']['url'];
$url7=$json7['articles']['7']['url'];
$url8=$json7['articles']['8']['url'];
$url9=$json7['articles']['9']['url'];



$str = file_get_contents('https://newsapi.org/v2/everything?q=bitcoin&sortBy=publishedAt&apiKey=98d4d58737b14c8faf97d18e498dbd45');
$json8 = json_decode($str, true);
 '<pre>' . print_r($json8, true) . '</pre>';
$btitle=$json8['articles']['0']['title'];
$btitle1=$json8['articles']['1']['title'];
$btitle2=$json8['articles']['2']['title'];
$btitle3=$json8['articles']['3']['title'];
$btitle4=$json8['articles']['4']['title'];
$btitle5=$json8['articles']['5']['title'];
$btitle6=$json8['articles']['6']['title'];
$btitle7=$json8['articles']['7']['title'];
$btitle8=$json8['articles']['8']['title'];
$btitle9=$json8['articles']['9']['title'];
$burl=$json8['articles']['0']['url'];
$burl1=$json8['articles']['1']['url'];
$burl2=$json8['articles']['2']['url'];
$burl3=$json8['articles']['3']['url'];
$burl4=$json8['articles']['4']['url'];
$burl5=$json8['articles']['5']['url'];
$burl6=$json8['articles']['6']['url'];
$burl7=$json8['articles']['7']['url'];
$burl8=$json8['articles']['8']['url'];
$burl9=$json8['articles']['9']['url'];

	
?>
<html>
<head>
<body style="background-image:url('black.jpg'); background-size:100%;">
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trade Kings</title>
</body>
</head>

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

<div style="position:absolute;top: 80px; right: 200px;color:white;font-size:60px; font-family:Poynter;">TRENDING BUSINESS NEWS</div>
<body style="background-image:url('black1.jpg'); background-size:100%;">

	</body>
<table style ="margin-top:90px; margin-left:300px;width:65%;color:#ffffff"border ='1'>
<tr>
<th><div style ='font:15px/21px Arial,tahoma,sans-serif;color:#ffffff'>Stock Updates</div></th>
<th><div style ='font:15px/21px Arial,tahoma,sans-serif;color:#ffffff'>Data</div></th>
</tr>

<?php
print"<tr><td>$name</td><td> Recent= $lastdate Open price= $openprice Close price=$closingprice</td></tr>\n";
print"<tr><td>$name1</td><td> Recent= $lastdate1 High= $high1 Low= $low1</td></tr>\n";
print"<tr><td>$name2</td><td> Recent= $lastdate2 High= $high2 Low= $low2</td></tr>\n";
print"<tr><td>$name3</td><td> Recent= $lastdate3 High= $high3 Low= $low3</td></tr>\n";  
print"<tr><td>$name4</td><td> Recent= $lastdate4 High= $high4 Low= $low4</td></tr>\n";
print"<tr><td>$name5</td><td> Recent= $lastdate5 High= $high5 Low= $low5</td></tr>\n";
print"<tr><td>$name6</td><td> Recent= $lastdate6 High= $high6 Low= $low6</td></tr>\n";
?>
</table>
<br>
<br>

<table style =" margin-left:300px;width:65%;color:#ffffff"border ='1'>
<tr>
<th><div style ='font:15px/21px Arial,tahoma,sans-serif;color:#ffffff'>Daily News</div></th>
<th><div style ='font:15px/21px Arial,tahoma,sans-serif;color:#ffffff'>LINK</div></th>
</tr>


<?php
echo"<tr><td>$title</td><td><a href='".$url."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title1</td><td><a href='".$url1."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title2</td><td><a href='".$url2."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title3</td><td><a href='".$url3."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title4</td><td><a href='".$url4."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title5</td><td><a href='".$url5."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title6</td><td><a href='".$url6."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title7</td><td><a href='".$url7."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title8</td><td><a href='".$url8."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$title9</td><td><a href='".$url9."'>CLICK HERE!</a></td></tr>\n";
?>
</table>
<br>
<br>
<table style =" margin-left:300px;width:65%;color:#ffffff"border ='1'>
<tr>
<th><div style ='font:15px/21px Arial,tahoma,sans-serif;color:#ffffff'>Cryptocurrencies News</div></th>
<th><div style ='font:15px/21px Arial,tahoma,sans-serif;color:#ffffff'>LINK</div></th>
</tr>


<?php
echo"<tr><td>$btitle</td><td><a href='".$burl."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle1</td><td><a href='".$burl1."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle2</td><td><a href='".$burl2."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle3</td><td><a href='".$burl3."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle4</td><td><a href='".$burl4."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle4</td><td><a href='".$burl4."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle5</td><td><a href='".$burl5."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle6</td><td><a href='".$burl6."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle7</td><td><a href='".$burl7."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle8</td><td><a href='".$burl8."'>CLICK HERE!</a></td></tr>\n";
echo"<tr><td>$btitle9</td><td><a href='".$burl9."'>CLICK HERE!</a></td></tr>\n";
?>
</table>
</html>