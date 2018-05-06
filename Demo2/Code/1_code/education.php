<?php
	session_start();
	$email = $_SESSION['email'];
	//echo '<p> '.$testing.' </p>';

if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['email']);
		$url = "newlogin.php";
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
			$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='stocks'){
			$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='crypto'){
				$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='trades'){
			$url="craken.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}
	}
	
	if(isset($_GET['analyze'])){
		$value=$_GET['analyze'];
		if($value=='true'){
			$url="ResearchStock_2.php?inputEmail3=" .$email;
			header('Location: '.$url);
			exit();
		}else if($value=='stocks'){
			$url="ResearchStock_2.php?inputEmail3=" .$email;
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

	if(isset($_GET['trade'])){
		$value=$_GET['trade'];
		if($value=='true'){
			$url="tradeStocks.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}else if($value=='stocks'){
			$url="tradeStocks.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}else if($value=='crypto'){
			$url="tradeCrypto.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}
	}
	
	if(isset($_GET['news'])){
		$value=$_GET['news'];
		if($value=='true'){
			$url="news.php?inputEmail3=" .$testing;
			header('Location: '.$url);
			exit();
		}
	}	
?>
<html>
<!--This program displays educational content on the stock and crytocurrency markets which will be maintained by the Educational Content Contributor. The content is currently displayed directly within the HTML. The UI is done with CSS grid which is used for the ogranizing of larger groups of information the whole page. -->
<style>

	body{
		background-color: lightgray;
		margin: 15px;
	}

	/*Style a table of contents container with links to important headings on content page*/
	#toc_container {
	    background: #f9f9f9 none repeat scroll 0 0;
	    border: 1px solid #aaa;
	    display: table;
	    font-size: 95%;
	    margin-bottom: 1em;
	    padding: 20px;
	    width: 240px;
	    position: fixed; /*Allow for the container to be freeze and follow user as they scroll*/
	    grid-area: topics;
	}

	.toc_title {
	    font-weight: 700;
	    text-align: center;
	}

	#toc_container li, #toc_container ul, #toc_container ul li{
	    list-style: outside none none !important;
	}

	/*Provide basic styling for content*/
	.description{
		text-indent: 45px;
	}
	.subheading{
		font-weight: bold;
	}
	.education{

		background-color: white;
		padding: 5px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); /*Create 3D effect for */
		grid-area: education;
	}

	/*Desing and style grid of educational content page*/
	.grid{
		display: grid;
		grid-template-columns: 0.5fr 1fr 1fr;
		grid-template-areas: 
		"topics education education"
		"topics education education"
		". education education"
		". education education"
		". education education"
		". education education";
		grid-column-gap: 20px;
		grid-row-gap: 20px;
	}
</style>
<head>
		<iframe
 src="https://widgets.tc2000.com/WidgetServer.ashx?id=100222"
 width="1250" 
 noresize="noresize" 
 scrolling="no" 
 height="16" 
 frameborder="0" 
 ></iframe>
</head>
<body style="background-image:url('perhaps.jpg'); background-size:100%;">
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
			</ul>
      </li>
	  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="?analyze=true">Analyze
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?analyze=stocks">Stocks</a></li>
				<li><a href="?analyze=crypto">Cryptocurrencies</a></li>
			</ul>
      </li>
	  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="?trade=true">Execute Trade
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="?trade=stocks">Stocks</a></li>
				<li><a href="?trade=crypto">Cryptocurrencies</a></li>
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
	  <li class="active"><a href="?education=true">Educational Content</a></li>
	  <li class=""><a href="?news=true">Daily Markets Update</a></li>
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
<div class="grid">
	<div id="toc_container">
	<p class="toc_title">Contents</p>
	<ul class="toc_list">
	  <li><a href="#Intro">1 Introduction</a></li>
	<li><a href="#StockGlossary">2 Stock Glossary</a></li>
	<li><a href="#CryptoGlossary">3 Crypto Glossary</a></li>
	</ul>
	</div>

	<div id="edcontent" class="education">
		<h1 id="intro">Introduction</h1>
		<hr>

		<p class="description"> When researching a particular stock or cryptocurrency, it is important to understand what every different piece of data means, so that you can make an informed investment decision. Here, we will be going over all the different terms that you will come across when rearching securities on Trade Kings.</p>

		<h1 id="StockGlossary">Stock Glossary of Terms</h1>
		<hr>

		<ol>
			<li><p class="subheading">Share Price:</p> <p class="description">The first value that you will see under a stock's name is its share price. The share price is the value of the smallest unit of that stock that can be bought or sold. This price is set by the forces of supply and demand. As the supply of a certain stock increases, it's share price goes down, and the opposite happens when the supply decreases. Similarly, as the demand of a certain stock increases, the share price is driven upwards.</p></li>

			<li><p class="subheading">Open:</p> <p class="description">The open or opening price is the share price that a stock first trades upon the opening of a particular exchange on a trading day. For example, the New York Stock Exchange (NYSE) opens at 9:30 am EDT and the open would be based on the first trade for that particular stock on that day. Opening prices are especially important for day trades, who wish to measure small intraday movements within a stock's share price.</p></li>

		  	<li><p class="subheading">Previous Close:</p> <p class="description">Similarly, the previous close or closing price of a stock is the share price that the stock traded at on the preceeding day's close. For the NYSE, the closing time (also known as the closing bell) is 4:00 pm EDT. Closing prices in combination with opening prices are important so that traders can see the interday movements of a stock's share price as a result of after-hours trading.</p></li>
			
			<li><p class="subheading">High:</p> <p class="description">The highest share price that the particular stock has reached so far during the current day.</p></li>

			<li><p class="subheading">Low:</p> <p class="description">The lowest share price that the particular stock has reached so far during the current day. The high and low provide a range of the stock’s share price, which can give a sense of the intraday volatility of that stock. These values are especially important if an unexpected market event occurs that affects the stock, causing it to fluctuate greatly.</p></li>

			<li><p class="subheading">Market Cap:</p> <p class="description">The market capitalization of a stock is the total value of all of a companies shares of a stock. It is essentially the market’s current perception of the total value of that company. We can use the market capitalization to find the total number of shares for a company: Market Cap\Share Price = # of Shares </p></li>

			<li><p class="subheading">P/E Ratio:</p> <p class="description">The P/E ratio is the ratio of the stock’s current share price to its earnings per share. This ratio can be found by either dividing the market cap by the total earnings or by dividing the share price by the earnings per share (EPS). The P/E ratio is useful because it provides a quick way of estimating the relative value of a company, especially when comparing it to its competitors and comparable companies. As a simple company, imagine that you’re looking at Apple and Microsoft. If everything else is equal, but Apple has a P/E ratio of 11 and Microsoft has a P/E ratio of 5, then Apple is considered overvalued because it’s share price is more expensive relative to its earnings. In this case, it would be more wise to invest in Microsoft. </p></li>

			<li><p class="subheading">Dividend Yield:</p> <p class="description">Dividend yield is the dividend of one share of stock expressed as a percentage of that stock’s share price. A dividend is a portion of a company’s profits that is given to the company’s shareholders (investors who currently own shares of that company’s stock). Dividends have become less important in current times, as investment decisions are primarily driven but the possible appreciation of a the stock’s share price. However, there are still companies where the dividends are quite substantial especially in Telecom companies, such as Verizon which currently has a dividend yield of 4.88% ($2.36 per share). </p></li>

			<li><p class="subheading">Beta:</p> <p class="description">Beta is the measure of the risk and volatility associated with a particular stock and company in comparison to the overall market. Usually an index such as the S&P500 is used as the overall market. Beta = 1.0 means that the stock has the same level of risk/volatility as the overall market. If Beta < 1.0 or Beta > 1.0, then the stock is less risky and more risky than the market, respectively. As an example, if a stock's Beta = 1.2, then the company is 20% riskier than the market. </p></li>

			<li><p class="subheading">Revenue:</p> <p class="description">Revenue is simply the amount of total cash that a company generates from selling its goods and services. This number is recorded both quarterly and annually, depending on the financial report (10-Q vs 10-K). </p></li>

			<li><p class="subheading">Net Income:</p> <p class="description">A company's net income is total earnings or profit. Typically, net income is calculated by taking the company's revenue and subtracting its costs, such as depreciation, interest, taxes and other expenses. The company's net income can be found on the Income Statement (which shows how the Net Income is calculated, by including relevant line items such as Revenue and the various costs of doing business). </p></li>

			<li><p class="subheading">EPS:</p> <p class="description">EPS stands for the earnings-per-share for a company. This is can simply be found by dividing the a company's Net Income (total earnings) by the total number of shares for the company. EPS is another usually metric that can be used in comparing companies. If everything else is equal, then the company with the higher EPS has a better value and should be invested it. However, it should be noted, that "everything else" is seldom equal. </p></li>

			<li><p class="subheading">EBITDA:</p> <p class="description">A company's EBITDA stands for its earnings before interest, taxes, depreciation and amortixation. This number can be found by looking at the company's net income statement, by taking the operating profit (EBIT) and adding back line items depreciation and amortization. We will talk about this in more detailed in future posts, but EBITDA is very useful and important because it provideds a simpler way of measuring a company's cash flow, which is instrumental in helping us determine the company's value. </p></li>
			
		</ol> 

		<h1 id="CryptoGlossary">Cryptocurrency Glossary of Terms</h1>
		<hr>

		<ol>
			<li><p class="subheading">Open:</p> <p class="description">This is the same as a stock market.</p></li>
			
			<li><p class="subheading">Close:</p> <p class="description">This is the same as a stock market.</p></li>
			
			<li><p class="subheading">High:</p> <p class="description">This is the same as a stock market.</p></li>
		
			<li><p class="subheading">Prev Close:</p> <p class="description">This is the same as a stock market.</p></li>
		
			<li><p class="subheading">Market Cap:</p> <p class="description">The market capitalization of a cryptocurrency is total dollar value of all outstanding units (units on the market) of that paritcular currency.</p></li>

			<li><p class="subheading">Volume (24hrs)</p> <p class="description">This value represents the amount of coin (cryptocurrency) that has been traded and changed hands in the past 24 hours. This value is extremely important because we can infer the direction and movements of a cryptocurrency's value based on its trading volume. For example, it we see that $4 Billion worth of Bitcoin has ben traded in the past 24 hours and the price is increases, then it means a lot of people are buying and selling this cryptocurrency and that we can usually expected to see the price to increase. </p></li>

			<li><p class="subheading">Circulating Supply:</p> <p class="description">This number is the best approximation of the number of coins for a crytocurrency that are circulating in the market. We can get the circulating supply by dividing the Market Capitalizaton by the current Price. </p></li>
		</ol>
	</div>
</div>


</body>
</html>